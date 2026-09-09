@props(['class' => 'w-5 h-5'])

<svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <!-- Cyber Lens Outer Ring -->
    <circle cx="10.5" cy="10.5" r="7.5" stroke="currentColor" stroke-width="2"/>
    <!-- Optical Target Crosshairs -->
    <path d="M10.5 4.5V7M10.5 14V16.5M4.5 10.5H7M14 10.5H16.5" 
          stroke="currentColor" 
          stroke-width="1.5" 
          stroke-linecap="round"
          stroke-opacity="0.6"/>
    <!-- Center Reticle Dot -->
    <circle cx="10.5" cy="10.5" r="1.5" fill="currentColor"/>
    <!-- Angled Lens Handle with Tech Notch -->
    <path d="M16 16L21 21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
</svg>
