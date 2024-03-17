<?php

namespace App\Http\Controllers;

use App\Actions\Policy\DownloadPolicyAsPDF;
use App\Models\Policy;

class DownloadPolicyDocumentController extends Controller
{
    public function __invoke(Policy $policy)
    {
        return (new DownloadPolicyAsPDF)->handle($policy);
    }
}
