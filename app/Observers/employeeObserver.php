<?php

namespace App\Observers;

use App\Models\employee;
use App\Traits\UuidTrait;

class employeeObserver
{
    use UuidTrait;
    /**
     * Handle the employee "created" event.
     */
    public function creating(employee $employee): void
    {
        $employee->id = $this->uuid();
    }
    public function created(employee $employee): void
    {
    }

    /**
     * Handle the employee "updated" event.
     */
    public function updated(employee $employee): void
    {
        //
    }

    /**
     * Handle the employee "deleted" event.
     */
    public function deleted(employee $employee): void
    {
        //
    }

    /**
     * Handle the employee "restored" event.
     */
    public function restored(employee $employee): void
    {
        //
    }

    /**
     * Handle the employee "force deleted" event.
     */
    public function forceDeleted(employee $employee): void
    {
        //
    }
}
