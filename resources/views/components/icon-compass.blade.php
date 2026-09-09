@props(['class' => 'w-5 h-5'])

<svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <!-- Outer Dial -->
    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
    <!-- Cardinal Notches -->
    <path d="M12 3V5M12 19V21M3 12H5M19 12H21" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
    <!-- Compass Rose Needle -->
    <polygon points="14.5,9.5 9.5,14.5 11,11" fill="currentColor"/>
    <polygon points="14.5,9.5 9.5,14.5 13,13" fill="currentColor" fill-opacity="0.4"/>
</svg>
