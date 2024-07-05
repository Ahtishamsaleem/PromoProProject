<?php

use Illuminate\Routing\Route;

// app/Helpers/Helper.php

if (!function_exists('generateButton')) {
    /**
     * Generate a styled button link or button element.
     *
     * @param string $url        The URL or javascript function for the button.
     * @param string $iconClass  The class for the icon (Font Awesome or other icon set).
     * @param string $tooltip    Optional tooltip text.
     * @param string $btnClass   Optional button class (e.g., 'btn-primary').
     * @param string $tagType    Optional tag type ('a' for anchor, 'button' for button).
     * @param string $onClickEvent Optional click event handler (javascript function).
     *
     * @return string
     */
    function generateButton($url, $iconClass, $tooltip = '', $btnClass = 'btn-primary',  $onClickEvent = '',$tagType = 'a')
    {
        $tagType = in_array($tagType, ['a', 'button']) ? $tagType : 'a'; // Default to 'a' if invalid type provided

        $html = '<' . $tagType . ' href="' . $url . '" class="btn btn-sm btn-' . $btnClass . ' border-0 p-0" ';
        
        if ($tagType === 'a') {
            $html .= 'type="button" '; // Only for anchor tag
        }

        if (!empty($tooltip)) {
            $html .= 'data-bs-toggle="tooltip" title="' . $tooltip . '" ';
        }

        if (!empty($onClickEvent)) {
            if ($tagType === 'a') {
                $html .= 'onclick="' . $onClickEvent . '" ';
            } else {
                $html .= 'onclick="' . $onClickEvent . '" type="button" ';
            }
        }

        $html .= '><i class="' . $iconClass . '"></i></' . $tagType . '>';

        return $html;
    }
}


if (!function_exists('formatDate')) {
    /**
     * Format a date.
     *
     * @param \DateTimeInterface|string|null $date
     * @param string                         $format
     *
     * @return string
     */
    function formatDate($date, $format = 'd-M-Y H:i:s')
    {
        if (!$date instanceof \DateTimeInterface && !is_string($date)) {
            return '';
        }

        if (is_string($date)) {
            $date = new \DateTime($date);
        }

        return $date->format($format);
    }
}

if (!function_exists('isActiveRoute')) {
    /**
     * Check if the current route matches a given route pattern.
     *
     * @param string $route
     * @param string $output
     *
     * @return string
     */
    function isActiveRoute($route, $output = 'active')
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        }

        return '';
    }
}


// app/Helpers/Helper.php



// Add more helper functions as needed...

