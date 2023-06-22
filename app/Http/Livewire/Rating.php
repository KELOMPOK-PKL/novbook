<?php

namespace App\Http\Livewire;

use App\Models\Novel;
use App\Models\Rating as ModelsRating;
use Livewire\Component;

class Rating extends Component
{
    public $novelId;
    public $rating;
    public $comment;
    public $showCommentForm;

    public function mount($novelId)
    {
        $this->novelId = $novelId;
    }

    public function render()
    {
        $ratings = ModelsRating::where('novel_id', $this->novelId)->get();

        return view('livewire.rating', compact('ratings'));
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
                'comment' => 'required|string',
            ]);
            // Simpan rating dan komentar ke dalam database
            $rating = ModelsRating::where('user_id', \auth()->user()->id)
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
                $rating = ModelsRating::create($data);
            }
        } else {
            return to_route('landing.login');
        }

        $this->showCommentForm = false;
        $this->emit('ratingAdded');
    }
}
