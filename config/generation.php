<?php

$svgNormalization = static function (string $tempFilepath) {
    // Read the content of the SVG file
    $svgContent = file_get_contents($tempFilepath);

    if ($svgContent === false) {
        exit('Failed to read the SVG file.');
    }

    // Remove the comment
    $svgContent = preg_replace('/<!--.*?-->/s', '', $svgContent);

    // Remove 'class', 'width', and 'height' attributes from the main <svg> tag only
    $svgContent = preg_replace_callback('/<svg\b([^>]*)>/s', function ($matches) {
        $attributes = $matches[1];

        // Remove specific attributes (class, width, height)
        $attributes = preg_replace('/\s(class|width|height)="[^"]*"/', '', $attributes);

        // Normalize whitespace between remaining attributes
        $attributes = preg_replace('/\s+/', ' ', trim($attributes));

        return "<svg $attributes>";
    }, $svgContent);

    // Remove blank lines (lines with only whitespace or nothing)
    $svgContent = preg_replace('/^\s*[\r\n]/m', '', $svgContent);

    // Save the modified SVG content back to the file
    $result = file_put_contents($tempFilepath, $svgContent);

    if ($result === false) {
        exit('Failed to write the modified SVG content.');
    }
};

return [
    [
        'source' => __DIR__.'/../node_modules/lucide-static/icons',
        'destination' => __DIR__.'/../resources/svg',
        'after' => $svgNormalization,
        'safe' => true,
    ],
];
