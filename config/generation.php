<?php

$svgNormalization = static function (string $tempFilepath) {
    // Read the content of the SVG file
    $svgContent = file_get_contents($tempFilepath);

    if ($svgContent === false) {
        exit('Failed to read the SVG file.');
    }

    // Remove the comment
    $svgContent = preg_replace('/<!--.*?-->/s', '', $svgContent);

    // Remove the 'class', 'width', and 'height' attributes
    $svgContent = preg_replace('/\s(class|width|height)="[^"]*"/', '', $svgContent);

    // Format the <svg> tag to have all attributes on the same line
    $svgContent = preg_replace_callback('/<svg([^>]*)>/s', function ($matches) {
        // Remove any extra newlines or spaces between attributes
        $attributes = preg_replace('/\s+/', ' ', trim($matches[1]));

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
