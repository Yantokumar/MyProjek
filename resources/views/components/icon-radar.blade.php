@props(['class' => 'w-5 h-5'])

<svg class="{{ $class }}" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <!-- Center Broadcast Dot -->
    <circle cx="12" cy="12" r="2.5" fill="currentColor"/>
    <!-- Outer Wave 1 -->
    <path d="M7.05 7.05C4.3 9.8 4.3 14.2 7.05 16.95M16.95 7.05C19.7 9.8 19.7 14.2 16.95 16.95" 
          stroke="currentColor" 
          stroke-width="2" 
          stroke-linecap="round"/>
    <!-- Outer Wave 2 -->
    <path d="M3.5 3.5C-0.8 7.8 -0.8 16.2 3.5 20.5M20.5 3.5C24.8 7.8 24.8 16.2 20.5 20.5" 
          stroke="currentColor" 
          stroke-width="1.8" 
          stroke-linecap="round"
          stroke-dasharray="2 4"/>
</svg>
