<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DeployController extends Controller
{
    public function deploy(Request $request)
    {
        Log::info('GitHub Webhook Deploy Triggered');
        
        // Security check - verify GitHub webhook secret (if configured)
        $githubPayload = $request->getContent();
        $githubHash = $request->header('X-Hub-Signature');
        
        $localToken = env('GITHUB_WEBHOOK_SECRET', '');
        
        if ($localToken !== '') {
            if (!$githubHash) {
                return response()->json(['error' => 'Signature missing'], 403);
            }
            $localHash = 'sha1=' . hash_hmac('sha1', $githubPayload, $localToken, false);
            if (!hash_equals($localHash, $githubHash)) {
                Log::warning('GitHub Webhook Secret Validation Failed');
                return response()->json(['error' => 'Invalid signature'], 403);
            }
        }

        // Execute the deploy script
        $root_dir = base_path();
        // Run in the background or run synchronously. Synchronously might timeout if composer takes too long,
        // but for small updates it's fine.
        $process = shell_exec("cd {$root_dir} && bash deploy.sh 2>&1");
        
        Log::info('Deploy Output: ' . $process);

        return response()->json(['status' => 'success', 'message' => 'Deployment triggered']);
    }
}
