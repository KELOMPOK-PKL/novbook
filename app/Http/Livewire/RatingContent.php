<?php

namespace App\Http\Livewire;

use App\Models\Rating;
use Livewire\Component;

class RatingContent extends Component
{
    public $novelId;
    public $ratingItems;

    public function mount($novelId)
    {
        $this->loadCartItems();
        $this->novelId = $novelId;
    }

    protected $listeners = [
        'ratingAdded' => 'updateRatingContent',
    ];

    public function render()
    {
        $averageRating = $this->calculateAverageRating();
        return view('livewire.rating-content', \compact('averageRating'));
    }

    public function updateRatingContent()
    {
        $this->loadCartItems();
    }

    public function refresh()
    {
        $this->loadCartItems();
    }

    private function loadCartItems()
    {
        $this->ratingItems = Rating::where('novel_id', $this->novelId)->get();
    }

    public function calculateAverageRating()
    {
        $totalRatings = count($this->ratingItems);

        if ($totalRatings > 0) {
            $sumRatings = 0;

            foreach ($this->ratingItems as $ratingItem) {
                $sumRatings += $ratingItem->rating;
            }

            return $sumRatings / $totalRatings;
        }

        return 0; // Mengembalikan 0 jika tidak ada rating
    }
}
