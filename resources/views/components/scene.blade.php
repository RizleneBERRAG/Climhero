{{-- Illustrations techniques maison, affichees tant qu'aucune photo n'est deposee --}}
@props(['name' => 'warm'])

@switch($name)
    @case('cool')
        <svg class="scene" viewBox="0 0 340 210" preserveAspectRatio="xMidYMid slice" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-accent="cool"><rect width="340" height="210" fill="url(#sc-bg)"/><defs><linearGradient id="sc-bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0a1a2b"/><stop offset="1" stop-color="#16304a"/></linearGradient></defs><path class="sc-grid" d="M0 0V210 M20 0V210 M40 0V210 M60 0V210 M80 0V210 M100 0V210 M120 0V210 M140 0V210 M160 0V210 M180 0V210 M200 0V210 M220 0V210 M240 0V210 M260 0V210 M280 0V210 M300 0V210 M320 0V210 M340 0V210 M0 0H340 M0 20H340 M0 40H340 M0 60H340 M0 80H340 M0 100H340 M0 120H340 M0 140H340 M0 160H340 M0 180H340 M0 200H340"/>
<circle class="sc-glow" cx="250" cy="60" r="70"/>
<path class="sc-line sc-dim" d="M30 168H310"/>
<path class="sc-line sc-dim" d="M60 168V52"/>
<rect class="sc-fill" x="60" y="52" width="150" height="46" rx="10"/>
<rect class="sc-line" x="60" y="52" width="150" height="46" rx="10"/>
<path class="sc-line sc-thin" d="M72 88H198"/>
<path class="sc-line sc-thin" d="M72 80H198"/>
<circle class="sc-accent-fill" cx="192" cy="64" r="4"/>
<path class="sc-accent" d="M120 116c14 10 30 10 44 0"/>
<path class="sc-accent" d="M108 134c22 14 48 14 70 0"/>
<path class="sc-accent" d="M96 152c30 18 64 18 94 0"/>
<rect class="sc-line" x="248" y="118" width="34" height="52" rx="8"/>
<path class="sc-line sc-thin" d="M258 132h14M258 142h14M258 152h6"/>
</svg>
        @break

    @case('warm')
        <svg class="scene" viewBox="0 0 340 210" preserveAspectRatio="xMidYMid slice" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-accent="warm"><rect width="340" height="210" fill="url(#sc-bg)"/><defs><linearGradient id="sc-bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0a1a2b"/><stop offset="1" stop-color="#16304a"/></linearGradient></defs><path class="sc-grid" d="M0 0V210 M20 0V210 M40 0V210 M60 0V210 M80 0V210 M100 0V210 M120 0V210 M140 0V210 M160 0V210 M180 0V210 M200 0V210 M220 0V210 M240 0V210 M260 0V210 M280 0V210 M300 0V210 M320 0V210 M340 0V210 M0 0H340 M0 20H340 M0 40H340 M0 60H340 M0 80H340 M0 100H340 M0 120H340 M0 140H340 M0 160H340 M0 180H340 M0 200H340"/>
<circle class="sc-glow sc-glow-warm" cx="120" cy="100" r="78"/>
<path class="sc-line sc-dim" d="M20 178H320"/>
<rect class="sc-fill" x="48" y="52" width="150" height="112" rx="12"/>
<rect class="sc-line" x="48" y="52" width="150" height="112" rx="12"/>
<circle class="sc-line" cx="132" cy="104" r="42"/>
<circle class="sc-line sc-thin" cx="132" cy="104" r="30"/>
<path class="sc-accent" d="M132 104 q18 -10 30 -2 q-14 10 -30 2 Z" transform="rotate(0 132 104)"/><path class="sc-accent" d="M132 104 q18 -10 30 -2 q-14 10 -30 2 Z" transform="rotate(90 132 104)"/><path class="sc-accent" d="M132 104 q18 -10 30 -2 q-14 10 -30 2 Z" transform="rotate(180 132 104)"/><path class="sc-accent" d="M132 104 q18 -10 30 -2 q-14 10 -30 2 Z" transform="rotate(270 132 104)"/>
<circle class="sc-accent-fill" cx="132" cy="104" r="6"/>
<path class="sc-line sc-thin" d="M62 66h22M62 76h22M62 86h14"/>
<path class="sc-accent" d="M198 96h46a14 14 0 0 1 14 14v50"/>
<path class="sc-accent" d="M198 118h28a14 14 0 0 1 14 14v28"/>
<rect class="sc-line" x="244" y="160" width="36" height="8" rx="4"/>
</svg>
        @break

    @case('steel')
        <svg class="scene" viewBox="0 0 340 210" preserveAspectRatio="xMidYMid slice" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-accent="steel"><rect width="340" height="210" fill="url(#sc-bg)"/><defs><linearGradient id="sc-bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0a1a2b"/><stop offset="1" stop-color="#16304a"/></linearGradient></defs><path class="sc-grid" d="M0 0V210 M20 0V210 M40 0V210 M60 0V210 M80 0V210 M100 0V210 M120 0V210 M140 0V210 M160 0V210 M180 0V210 M200 0V210 M220 0V210 M240 0V210 M260 0V210 M280 0V210 M300 0V210 M320 0V210 M340 0V210 M0 0H340 M0 20H340 M0 40H340 M0 60H340 M0 80H340 M0 100H340 M0 120H340 M0 140H340 M0 160H340 M0 180H340 M0 200H340"/>
<circle class="sc-glow sc-glow-steel" cx="170" cy="70" r="88"/>
<path class="sc-line sc-dim" d="M16 40H324"/>
<rect class="sc-fill" x="40" y="58" width="270" height="38" rx="6"/>
<rect class="sc-line" x="40" y="58" width="270" height="38" rx="6"/>
<path class="sc-line sc-thin" d="M110 58v38M200 58v38M290 58v38"/>
<rect class="sc-line" x="88" y="96" width="30" height="12" rx="3"/>
<rect class="sc-line" x="178" y="96" width="30" height="12" rx="3"/>
<rect class="sc-line" x="268" y="96" width="30" height="12" rx="3"/>
<path class="sc-line sc-thin" d="M96 96v14M102 96v14M108 96v14"/><path class="sc-line sc-thin" d="M186 96v14M192 96v14M198 96v14"/><path class="sc-line sc-thin" d="M276 96v14M282 96v14M288 96v14"/>
<path class="sc-accent" d="M103 124v22M193 124v22M283 124v22"/>
<path class="sc-accent" d="M97 140l6 8 6-8M187 140l6 8 6-8M277 140l6 8 6-8"/>
<rect class="sc-line" x="40" y="132" width="42" height="42" rx="8"/>
<path class="sc-line sc-thin" d="M50 146h22M50 154h22M50 162h12"/>
</svg>
        @break

    @case('sun')
        <svg class="scene" viewBox="0 0 340 210" preserveAspectRatio="xMidYMid slice" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-accent="sun"><rect width="340" height="210" fill="url(#sc-bg)"/><defs><linearGradient id="sc-bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0a1a2b"/><stop offset="1" stop-color="#16304a"/></linearGradient></defs><path class="sc-grid" d="M0 0V210 M20 0V210 M40 0V210 M60 0V210 M80 0V210 M100 0V210 M120 0V210 M140 0V210 M160 0V210 M180 0V210 M200 0V210 M220 0V210 M240 0V210 M260 0V210 M280 0V210 M300 0V210 M320 0V210 M340 0V210 M0 0H340 M0 20H340 M0 40H340 M0 60H340 M0 80H340 M0 100H340 M0 120H340 M0 140H340 M0 160H340 M0 180H340 M0 200H340"/>
<circle class="sc-glow sc-glow-sun" cx="266" cy="38" r="60"/>
<circle class="sc-accent-fill" cx="266" cy="34" r="17"/>
<path class="sc-accent" d="M266 34 m0 -26 v-10" transform="rotate(0 266 34)"/><path class="sc-accent" d="M266 34 m0 -26 v-10" transform="rotate(45 266 34)"/><path class="sc-accent" d="M266 34 m0 -26 v-10" transform="rotate(90 266 34)"/><path class="sc-accent" d="M266 34 m0 -26 v-10" transform="rotate(135 266 34)"/><path class="sc-accent" d="M266 34 m0 -26 v-10" transform="rotate(180 266 34)"/><path class="sc-accent" d="M266 34 m0 -26 v-10" transform="rotate(225 266 34)"/><path class="sc-accent" d="M266 34 m0 -26 v-10" transform="rotate(270 266 34)"/><path class="sc-accent" d="M266 34 m0 -26 v-10" transform="rotate(315 266 34)"/>
<path class="sc-line sc-dim" d="M24 178H316"/>
<path class="sc-fill" d="M40 176 L96 74 L246 74 L190 176 Z"/>
<path class="sc-line" d="M40 176 L96 74 L246 74 L190 176 Z"/>
<path class="sc-panel" d="M70 88 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M108 88 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M146 88 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M184 88 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M222 88 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M56 114 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M94 114 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M132 114 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M170 114 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M208 114 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M42 140 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M80 140 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M118 140 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M156 140 l32 0 l-13 22 l-32 0 Z"/><path class="sc-panel" d="M194 140 l32 0 l-13 22 l-32 0 Z"/>
</svg>
        @break

    @case('ice')
        <svg class="scene" viewBox="0 0 340 210" preserveAspectRatio="xMidYMid slice" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-accent="ice"><rect width="340" height="210" fill="url(#sc-bg)"/><defs><linearGradient id="sc-bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0a1a2b"/><stop offset="1" stop-color="#16304a"/></linearGradient></defs><path class="sc-grid" d="M0 0V210 M20 0V210 M40 0V210 M60 0V210 M80 0V210 M100 0V210 M120 0V210 M140 0V210 M160 0V210 M180 0V210 M200 0V210 M220 0V210 M240 0V210 M260 0V210 M280 0V210 M300 0V210 M320 0V210 M340 0V210 M0 0H340 M0 20H340 M0 40H340 M0 60H340 M0 80H340 M0 100H340 M0 120H340 M0 140H340 M0 160H340 M0 180H340 M0 200H340"/>
<circle class="sc-glow sc-glow-ice" cx="110" cy="100" r="80"/>
<path class="sc-line sc-dim" d="M16 178H324"/>
<rect class="sc-fill" x="42" y="34" width="132" height="144" rx="8"/>
<rect class="sc-line" x="42" y="34" width="132" height="144" rx="8"/>
<rect class="sc-line sc-thin" x="54" y="46" width="108" height="120" rx="5"/>
<rect class="sc-accent-fill" x="150" y="96" width="7" height="26" rx="3.5"/>
<path class="sc-accent" d="M108 106 L138.0 106.0 M124.5 106.0 L130.9 112.4 M124.5 106.0 L130.9 99.6 M108 106 L123.0 132.0 M116.2 120.3 L113.9 129.0 M116.2 120.3 L124.9 122.6 M108 106 L93.0 132.0 M99.8 120.3 L91.1 122.6 M99.8 120.3 L102.1 129.0 M108 106 L78.0 106.0 M91.5 106.0 L85.1 99.6 M91.5 106.0 L85.1 112.4 M108 106 L93.0 80.0 M99.8 91.7 L102.1 83.0 M99.8 91.7 L91.1 89.4 M108 106 L123.0 80.0 M116.2 91.7 L124.9 89.4 M116.2 91.7 L113.9 83.0"/>
<rect class="sc-line" x="196" y="46" width="118" height="30" rx="6"/>
<path class="sc-line sc-thin" d="M206 56h98M206 66h98"/>
<rect class="sc-line" x="210" y="98" width="92" height="7" rx="3"/>
<rect class="sc-line" x="210" y="128" width="92" height="7" rx="3"/>
<rect class="sc-line" x="210" y="158" width="92" height="7" rx="3"/>
<path class="sc-line sc-thin" d="M216 98v70M296 98v70"/>
</svg>
        @break

    @case('aqua')
        <svg class="scene" viewBox="0 0 340 210" preserveAspectRatio="xMidYMid slice" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-accent="aqua"><rect width="340" height="210" fill="url(#sc-bg)"/><defs><linearGradient id="sc-bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0a1a2b"/><stop offset="1" stop-color="#16304a"/></linearGradient></defs><path class="sc-grid" d="M0 0V210 M20 0V210 M40 0V210 M60 0V210 M80 0V210 M100 0V210 M120 0V210 M140 0V210 M160 0V210 M180 0V210 M200 0V210 M220 0V210 M240 0V210 M260 0V210 M280 0V210 M300 0V210 M320 0V210 M340 0V210 M0 0H340 M0 20H340 M0 40H340 M0 60H340 M0 80H340 M0 100H340 M0 120H340 M0 140H340 M0 160H340 M0 180H340 M0 200H340"/>
<circle class="sc-glow sc-glow-aqua" cx="140" cy="100" r="76"/>
<path class="sc-line sc-dim" d="M20 180H320"/>
<rect class="sc-fill" x="86" y="34" width="108" height="146" rx="26"/>
<rect class="sc-line" x="86" y="34" width="108" height="146" rx="26"/>
<path class="sc-line sc-thin" d="M86 70h108"/>
<rect class="sc-line" x="112" y="88" width="56" height="30" rx="6"/>
<path class="sc-accent" d="M124 104h12M148 98v12M142 104h12"/>
<path class="sc-accent" d="M194 60h44a12 12 0 0 1 12 12v26"/>
<path class="sc-accent" d="M194 150h60"/>
<circle class="sc-line" cx="250" cy="112" r="14"/>
<path class="sc-line sc-thin" d="M250 100v12l8 5"/>
<path class="sc-accent-fill" d="M276 140c0 0 -14 15 -14 24a14 14 0 0 0 28 0c0 -9 -14 -24 -14 -24Z"/>
<path class="sc-line sc-thin" d="M108 46h20"/>
</svg>
        @break

    @default
        <svg class="scene" viewBox="0 0 340 210" preserveAspectRatio="xMidYMid slice" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-accent="warm"><rect width="340" height="210" fill="url(#sc-bg)"/><defs><linearGradient id="sc-bg" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0a1a2b"/><stop offset="1" stop-color="#16304a"/></linearGradient></defs><path class="sc-grid" d="M0 0V210 M20 0V210 M40 0V210 M60 0V210 M80 0V210 M100 0V210 M120 0V210 M140 0V210 M160 0V210 M180 0V210 M200 0V210 M220 0V210 M240 0V210 M260 0V210 M280 0V210 M300 0V210 M320 0V210 M340 0V210 M0 0H340 M0 20H340 M0 40H340 M0 60H340 M0 80H340 M0 100H340 M0 120H340 M0 140H340 M0 160H340 M0 180H340 M0 200H340"/>
<circle class="sc-glow sc-glow-warm" cx="120" cy="100" r="78"/>
<path class="sc-line sc-dim" d="M20 178H320"/>
<rect class="sc-fill" x="48" y="52" width="150" height="112" rx="12"/>
<rect class="sc-line" x="48" y="52" width="150" height="112" rx="12"/>
<circle class="sc-line" cx="132" cy="104" r="42"/>
<circle class="sc-line sc-thin" cx="132" cy="104" r="30"/>
<path class="sc-accent" d="M132 104 q18 -10 30 -2 q-14 10 -30 2 Z" transform="rotate(0 132 104)"/><path class="sc-accent" d="M132 104 q18 -10 30 -2 q-14 10 -30 2 Z" transform="rotate(90 132 104)"/><path class="sc-accent" d="M132 104 q18 -10 30 -2 q-14 10 -30 2 Z" transform="rotate(180 132 104)"/><path class="sc-accent" d="M132 104 q18 -10 30 -2 q-14 10 -30 2 Z" transform="rotate(270 132 104)"/>
<circle class="sc-accent-fill" cx="132" cy="104" r="6"/>
<path class="sc-line sc-thin" d="M62 66h22M62 76h22M62 86h14"/>
<path class="sc-accent" d="M198 96h46a14 14 0 0 1 14 14v50"/>
<path class="sc-accent" d="M198 118h28a14 14 0 0 1 14 14v28"/>
<rect class="sc-line" x="244" y="160" width="36" height="8" rx="4"/>
</svg>
@endswitch
