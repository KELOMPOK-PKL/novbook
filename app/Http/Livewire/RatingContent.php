<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use Livewire\Component;

class RatingContent extends Component
{
    public $novelId;
    public $ratingItems;
    public $edit_rating_id;
    public $showFormEdit;
    public $newComment;
    public $newRating;
    public $rating;
    public $deleteRatingId;

    public function mount($novelId)
    {
        $this->loadNovelRating();
        $this->novelId = $novelId;
    }

    protected $listeners = [
        'ratingAdded' => 'updateRatingContent',
    ];

    public function render()
    {
        return view('livewire.rating-content');
    }

    public function updateRatingContent()
    {
        $this->loadNovelRating();
    }

    public function refresh()
    {
        $this->loadNovelRating();
    }

    public function setRating($value)
    {
        $this->newRating = $value;
    }


    public function selectEdit($id)
    {
        $rating = Rating::find($id);
        $this->edit_rating_id = $rating->id;
        $this->rating = $rating->id;
        $this->showFormEdit = true;
    }

    public function update()
    {
        $this->validate([
            'newRating' => 'nullable|integer|min:1|max:5',
            'newComment' => 'nullable|string',
        ]);

        Rating::updateOrCreate(
            ['user_id' => auth()->user()->id, 'novel_id' => $this->novelId],
            ['rating' => $this->newRating, 'comment' => $this->newComment]
        );

        $this->reset(['newRating', 'newComment']);
        $this->loadNovelRating();

        $this->showFormEdit = false;
    }

    private function loadNovelRating()
    {
        $this->ratingItems = Rating::where('novel_id', $this->novelId)
            ->orderBy('created_at', 'DESC')
            ->get();

        $rating = $this->ratingItems->firstWhere('user_id', auth()->user()->id);

        if ($rating) {
            $this->newRating = $rating->rating;
            $this->newComment = $rating->comment;
        }
    }

    public function delete($id)
    {
        $this->deleteRatingId = $id;
        Rating::find($this->deleteRatingId)->delete();
        $this->deleteRatingId = null;
        $this->loadNovelRating();
    }
}
