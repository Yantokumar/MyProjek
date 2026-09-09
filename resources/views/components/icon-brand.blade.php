@props(['class' => 'w-6 h-6'])

<svg class="{{ $class }}" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <linearGradient id="brandGrad" x1="2" y1="2" x2="30" y2="30" gradientUnits="userSpaceOnUse">
            <stop offset="0%" stop-color="#38bdf8"/>
            <stop offset="50%" stop-color="#2563eb"/>
            <stop offset="100%" stop-color="#4f46e5"/>
        </linearGradient>
        <linearGradient id="brandLight" x1="6" y1="4" x2="26" y2="24" gradientUnits="userSpaceOnUse">
            <stop offset="0%" stop-color="#ffffff" stop-opacity="0.8"/>
            <stop offset="100%" stop-color="#ffffff" stop-opacity="0"/>
        </linearGradient>
    </defs>
    <!-- Outer Shield / Hexagonal Cut -->
    <path d="M16 2L28 8.5V23.5L16 30L4 23.5V8.5L16 2Z" fill="url(#brandGrad)"/>
    <!-- Cyber Core Play / Wings -->
    <path d="M12 9.5L23 16L12 22.5V9.5Z" fill="white" fill-opacity="0.95"/>
    <path d="M16 3L27 9V23L16 29L5 23V9L16 3Z" stroke="url(#brandLight)" stroke-width="1.2"/>
    <!-- Central Prism Light -->
    <path d="M12 9.5L18 16L12 22.5V9.5Z" fill="white" fill-opacity="0.3"/>
</svg>
