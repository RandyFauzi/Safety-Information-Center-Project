<div x-data="{ hover: null }" class="relative max-w-3xl mx-auto mt-10">
    {{-- Render SVG --}}
    <div class="flex justify-center items-center mt-8">
        <div class="w-full max-w-[400px]">
            {!! file_get_contents(public_path('images/apd-test.svg')) !!}
        </div>
    </div>

    {{-- Tooltip Persentase --}}
    <template x-if="hover">
        <div x-text="hoverText(hover)" class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-full bg-white text-gray-800 text-sm px-3 py-1 rounded shadow z-50"></div>
    </template>

    {{-- Tooltip element --}}
    <div 
        id="tooltip-apd"
        class="hidden fixed z-50 text-white text-sm px-3 py-1 rounded shadow-lg transform transition-all duration-200 scale-90"
        style="pointer-events: none"
    >
        Tooltip APD
    </div>

    <script>
        const tooltip = document.getElementById("tooltip-apd");

        const apdStatus = {
            helm: {{ $persen['helm'] ?? 0 }},
            sepatu: {{ $persen['sepatu'] ?? 0 }},
            kacamata: {{ $persen['kacamata'] ?? 0 }},
            masker: {{ $persen['masker'] ?? 0 }},
            earplug: {{ $persen['earplug'] ?? 0 }},
        };

        function getColor(percent) {
            if (percent >= 75) return '#16a34a'; // green
            if (percent >= 50) return '#facc15'; // yellow
            if (percent >= 25) return '#f97316'; // orange
            return '#dc2626'; // red
        }

        function setupTooltip(apdName) {
            const element = document.getElementById(apdName);
            if (!element) return;

            element.addEventListener('mouseenter', (e) => {
                const percent = apdStatus[apdName];
                tooltip.innerText = `${apdName.charAt(0).toUpperCase() + apdName.slice(1)} Health ${percent}%`;
                tooltip.style.backgroundColor = getColor(percent);
                tooltip.style.left = (e.pageX + 12) + 'px';
                tooltip.style.top = (e.pageY + 12) + 'px';
                tooltip.classList.remove('hidden');
                tooltip.classList.add('scale-100');
            });

            element.addEventListener('mousemove', (e) => {
                tooltip.style.left = (e.pageX + 12) + 'px';
                tooltip.style.top = (e.pageY + 12) + 'px';
            });

            element.addEventListener('mouseleave', () => {
                tooltip.classList.add('hidden');
                tooltip.classList.remove('scale-100');
            });
        }

        ['helm', 'sepatu', 'kacamata', 'masker', 'earplug'].forEach(setupTooltip);
    </script>
</div>
