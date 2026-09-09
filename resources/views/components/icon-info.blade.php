@props(['class' => 'w-5 h-5'])

<svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <!-- Outer Octagon / Rounded Hex -->
    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
    <!-- Info Glyph -->
    <circle cx="12" cy="7.5" r="1.2" fill="currentColor"/>
    <path d="M12 11V16.5M10.5 11H12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
</svg>
