<?php

namespace App\Http\Livewire;

use App\Models\Novel;
use App\Models\Rating;
use Livewire\Component;

class NovelRating extends Component
{
    public $novelId;
    public $rating;
    public $comment;
    public $showCommentForm;
    public $ratingItems;

    protected $listeners = ['ratingAdded' => 'refreshRating'];

    public function mount($novelId)
    {
        $this->loadNovelRating();
        $this->novelId = $novelId;
    }

    public function render()
    {
        $averageRating = $this->calculateAverageRating();
        $novel = Novel::findOrFail($this->novelId);

        return view('livewire.novel-rating', [
            'averageRating' => $averageRating,
            'novel' => $novel,
        ]);
    }

    public function setRating($value)
    {
        $this->rating = $value;
        $this->showCommentForm = true;
    }

    public function submit()
    {
        if (auth()->user()) {
            $this->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string',
            ]);
            // Simpan rating dan komentar ke dalam database
            $rating = Rating::where('user_id', \auth()->user()->id)
                ->where('novel_id', $this->novelId)
                ->first();
            $data = [
                'user_id' => \auth()->user()->id,
                'novel_id' => $this->novelId,
                'rating' => $this->rating,
                'comment' => $this->comment,
            ];
            if ($rating) {
                return "Anda hanya bisa memasukkan 1 kali";
            } else {
                $rating = Rating::create($data);
            }
        } else {
            return to_route('landing.login');
        }
        $this->showCommentForm = false;
        $this->emit('ratingAdded');
    }

    public function updatedRatingItems()
    {
        $this->loadNovelRating();
    }

    public function refreshRating()
    {
        $this->loadNovelRating();
    }

    private function loadNovelRating()
    {
        $this->ratingItems = Rating::where('novel_id', $this->novelId)->orderBy('created_at', 'DESC')->get();
    }

    public function calculateAverageRating()
    {
        if ($this->ratingItems !== null) {
            $totalRatings = count($this->ratingItems);

            if ($totalRatings > 0) {
                $sumRatings = 0;

                foreach ($this->ratingItems as $ratingItem) {
                    $sumRatings += $ratingItem->rating;
                }

                return number_format($sumRatings / $totalRatings, 1);
            }
        }

        return 0; // Mengembalikan 0 jika tidak ada rating
    }
}