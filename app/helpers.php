<?php
if (!function_exists('assetTimestamp')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function assetTimestamp(string $path, bool $secure = null): string
    {
        return app('url')->asset($path, $secure) . '?v=' . filemtime(public_path($path));
    }
}
