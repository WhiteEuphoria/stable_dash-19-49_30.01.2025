<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Filament\Client\Pages\Verification;
class CheckVerificationStatus
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        // Ensure the user is authenticated and is not an admin
        if ($user && !$user->is_admin) {
            $isApproved = $user->verification_status === 'approved';

            // Allow-list: auth routes and verification page
            $allow = false;
            $routeName = optional($request->route())->getName();

            if ($routeName) {
                if ($request->routeIs('filament.client.auth.*')) {
                    $allow = true;
                }
                if ($request->routeIs('filament.client.pages.verification') || $request->routeIs('filament.client.pages.verification.*')) {
                    $allow = true;
                }
            }

            // Fallback by path if route name is not resolved
            $path = '/'.ltrim($request->path(), '/');
            if (str_starts_with($path, '/client')) {
                if (str_contains($path, '/verification') || str_contains($path, '/login') || str_contains($path, '/logout')) {
                    $allow = true;
                }
            }

            if (!$isApproved && !$allow) {
                // Not approved: force to verification
                return redirect()->route('filament.client.pages.verification');
            }

            if ($isApproved && ($request->routeIs('filament.client.pages.verification') || str_contains($path, '/client/verification'))) {
                return redirect()->route('filament.client.pages.dashboard');
            }
        }
        return $next($request);
    }
}
