<?php

namespace App\Actions\Policy;

use App\Models\Policy;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class DownloadPolicyAsPDF
{
    public function handle(Policy $policy)
    {
        try {
            return $this->withGeneratedDocumentResponse($policy);
        } catch (\Exception $e) {
            return 'An error occurred: '.$e->getMessage();
        }
    }

    public function withGeneratedDocumentResponse(Policy $policy)
    {
        $pdfPath = $this->createPdfFile($policy);

        $fp = fopen($pdfPath, 'rb');

        return response()->stream(function () use ($fp) {
            fpassthru($fp);
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => sprintf('inline; filename="%s"', $this->policyPdfName($policy)),
        ]);
    }

    private function createPdfFile(Policy $policy): string
    {
        // Used for caching the file, there is more efficient ways, but this is a simple example
        $hash = hash('sha256', $policy->toJson());

        $pdfName = $this->policyPdfName($policy);

        $pdfPath = storage_path(sprintf('pdfs/%s/%s', $hash, $pdfName));

        if (! File::exists(dirname($pdfPath))) {
            File::makeDirectory(dirname($pdfPath), 0755, true);
        }

        if (! File::exists($pdfPath)) {
            $html = view('pdfs.policy.contract', ['policy' => $policy])->render();

            Http::sink($pdfPath)->attach('files', $html, 'index.html')
                ->post(sprintf('%s/forms/chromium/convert/html', config('services.gotenberg.url')));
        }

        return $pdfPath;
    }

    private function policyPdfName(Policy $policy): string
    {
        return sprintf('policy-%s.pdf', $policy->policy_no);
    }
}
