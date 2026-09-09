@props(['class' => 'w-5 h-5'])

<svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <!-- Cinema Clapper / Reel Body -->
    <rect x="2.5" y="4" width="19" height="16" rx="3.5" stroke="currentColor" stroke-width="2"/>
    <!-- Diagonal Film Strips -->
    <path d="M2.5 9H21.5" stroke="currentColor" stroke-width="1.8"/>
    <path d="M7 4L5 9" stroke="currentColor" stroke-width="1.8"/>
    <path d="M12 4L10 9" stroke="currentColor" stroke-width="1.8"/>
    <path d="M17 4L15 9" stroke="currentColor" stroke-width="1.8"/>
    <!-- Cinema Center Play Diamond -->
    <polygon points="10,12 16,15 10,18" fill="currentColor"/>
</svg>
