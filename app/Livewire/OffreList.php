<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Offre;

class OffreList extends Component
{
    public $search = '';
    public $typeContratFilter = [];

    public function render()
    {
        $offre = Offre::where('cloturer', false);

        if ($this->search) {
            $offre->where('titre', 'like', '%' . $this->search . '%')
                  ->orWhere('entrepriseName', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->typeContratFilter)) {
            $offre->whereIn('typeContrat', $this->typeContratFilter);
        }

        $offres = $offre->get();

        return view('livewire.offre-list', compact('offres'));
    }
}
