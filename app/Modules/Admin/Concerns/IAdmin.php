<?php

namespace App\Modules\Admin\Concerns;

Interface IAdmin{


    /**
     * returns a list of branches accessible to an admin
     * @return Collection
     */
    public function getAdminBranches();

    /**
     * Returns a list of branches this Admin has access to as an array
     * @return Array
     */
    public function pluckBranches();
}
