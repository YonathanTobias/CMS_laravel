@props([
    'name' => 'content',
    'value' => '',
    'label' => 'Isi Konten Halaman / Artikel',
    'required' => false,
    'rows' => 14,
    'placeholder' => 'Tuliskan isi konten secara lengkap di sini...'
])

<script>
if (typeof window.dualEditorComponent === 'undefined') {
    window.dualEditorComponent = function(initialValue) {
        return {
            mode: 'visual',
            content: initialValue || '',
            isComplexHtml: false,

            init() {
                if (this.content && (
                    this.content.includes('<div') || 
                    this.content.includes('<section') || 
                    this.content.includes('<iframe') || 
                    this.content.includes('<style') || 
                    this.content.includes('<script') ||
                    this.content.includes('<table')
                )) {
                    this.isComplexHtml = true;
                    this.mode = 'code';
                } else {
                    this.mode = 'visual';
                }

                this.$nextTick(() => {
                    if (this.$refs.visualEditor && this.mode === 'visual') {
                        this.$refs.visualEditor.innerHTML = this.content || '';
                    }
                });
            },

            switchToVisual() {
                this.mode = 'visual';
                this.$nextTick(() => {
                    if (this.$refs.visualEditor) {
                        this.$refs.visualEditor.innerHTML = this.content || '';
                    }
                });
            },

            switchToCode() {
                if (this.$refs.visualEditor && this.mode === 'visual') {
                    this.content = this.$refs.visualEditor.innerHTML;
                }
                this.mode = 'code';
            },

            updateFromVisual() {
                if (this.$refs.visualEditor) {
                    this.content = this.$refs.visualEditor.innerHTML;
                }
            },

            updateFromCode() {
                if (this.$refs.visualEditor && this.mode === 'code') {
                    this.$refs.visualEditor.innerHTML = this.content;
                }
            },

            exec(command, value = null) {
                document.execCommand(command, false, value);
                this.updateFromVisual();
                if (this.$refs.visualEditor) {
                    this.$refs.visualEditor.focus();
                }
            },

            insertLink() {
                const url = prompt('Masukkan URL Link (contoh: https://stikespantiwaluya.ac.id/ atau /halaman/beasiswa):');
                if (url) {
                    this.exec('createLink', url);
                }
            },

            insertTable() {
                const html = '<table class="w-full border-collapse border border-slate-300 my-4"><thead><tr class="bg-slate-100"><th class="border border-slate-300 p-2 text-left">Judul Kolom 1</th><th class="border border-slate-300 p-2 text-left">Judul Kolom 2</th></tr></thead><tbody><tr><td class="border border-slate-300 p-2">Isi Baris 1</td><td class="border border-slate-300 p-2">Isi Baris 2</td></tr></tbody></table><p><br></p>';
                this.exec('insertHTML', html);
            }
        };
    };
}
</script>

<div x-data="dualEditorComponent(@js($value ?? ''))" class="space-y-3">

    <style>
        .editor-visual-content {
            outline: none;
            min-height: 380px;
            padding: 1.25rem;
            font-size: 0.95rem;
            line-height: 1.7;
            color: #1e293b;
            background-color: #ffffff;
            border-bottom-left-radius: 0.75rem;
            border-bottom-right-radius: 0.75rem;
        }
        .editor-visual-content h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            color: #0f172a;
        }
        .editor-visual-content h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-top: 0.85rem;
            margin-bottom: 0.4rem;
            color: #1e293b;
        }
        .editor-visual-content h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-top: 0.75rem;
            margin-bottom: 0.3rem;
            color: #334155;
        }
        .editor-visual-content p {
            margin-bottom: 0.75rem;
        }
        .editor-visual-content ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin-bottom: 0.75rem;
        }
        .editor-visual-content ol {
            list-style-type: decimal;
            padding-left: 1.5rem;
            margin-bottom: 0.75rem;
        }
        .editor-visual-content li {
            margin-bottom: 0.25rem;
        }
        .editor-visual-content blockquote {
            border-left: 4px solid #2563eb;
            padding-left: 1rem;
            font-style: italic;
            color: #475569;
            margin: 1rem 0;
            background: #f8fafc;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            border-radius: 0 0.5rem 0.5rem 0;
        }
        .editor-visual-content a {
            color: #1d4ed8;
            text-decoration: underline;
            font-weight: 600;
        }
        .editor-visual-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }
        .editor-visual-content th, .editor-visual-content td {
            border: 1px solid #cbd5e1;
            padding: 0.5rem 0.75rem;
        }
        .editor-visual-content th {
            background-color: #f1f5f9;
            font-weight: 600;
        }
    </style>

    <!-- Header Label & Switcher Tabs -->
    <div class="flex flex-wrap items-center justify-between gap-2 pb-1">
        <div class="flex items-center gap-2">
            <label class="block text-xs font-bold uppercase text-slate-700 tracking-wide">
                {{ $label }}
            </label>
            <template x-if="isComplexHtml">
                <span class="bg-amber-100 text-amber-800 text-[10px] font-bold px-2 py-0.5 rounded-md border border-amber-200">
                    <i class="fa-solid fa-code text-amber-600 mr-1"></i> Terdeteksi HTML Custom (Tim IT)
                </span>
            </template>
        </div>
        
        <!-- Mode Switcher Buttons -->
        <div class="flex items-center bg-slate-200/80 p-1 rounded-xl gap-1 text-xs font-bold shadow-inner">
            <button type="button" @click="switchToVisual()" 
                :class="mode === 'visual' ? 'bg-white text-blue-700 shadow-sm border border-slate-200 font-extrabold' : 'text-slate-600 hover:text-slate-900'" 
                class="px-3.5 py-1.5 rounded-lg transition-all flex items-center gap-1.5">
                <i class="fa-solid fa-pen-to-square text-emerald-600"></i> 
                <span>Editor Visual (Teks Biasa / Non-IT)</span>
            </button>
            <button type="button" @click="switchToCode()" 
                :class="mode === 'code' ? 'bg-slate-900 text-sky-300 shadow-sm font-extrabold' : 'text-slate-600 hover:text-slate-900'" 
                class="px-3.5 py-1.5 rounded-lg transition-all flex items-center gap-1.5">
                <i class="fa-solid fa-code text-amber-400"></i> 
                <span>Editor Kode HTML (Tim IT)</span>
            </button>
        </div>
    </div>

    <!-- Info Helper Banner -->
    <div x-show="mode === 'visual'" class="bg-blue-50 border border-blue-200 text-blue-900 text-xs p-3 rounded-xl space-y-1">
        <div class="flex items-center gap-2 font-bold text-blue-800">
            <i class="fa-solid fa-circle-info text-blue-600"></i>
            <span>Mode Editor Visual (Untuk Admin Non-IT):</span>
        </div>
        <p class="text-slate-600 leading-relaxed pl-6">
            Ketik dan format tulisan secara langsung seperti di Microsoft Word (Tebal, Miring, Heading, List, Warna Teks) tanpa perlu mengerti kode HTML.
        </p>
        <template x-if="isComplexHtml">
            <div class="mt-2 p-2 bg-amber-50 border border-amber-200 text-amber-900 rounded-lg text-[11px] font-medium flex items-center gap-2">
                <i class="fa-solid fa-triangle-exclamation text-amber-600"></i>
                <span><strong>Perhatian:</strong> Halaman ini sebelumnya dibuat dengan struktur kode HTML custom. Jika Anda mengubahnya di Mode Visual, tata letak khusus buatan Tim IT dapat berubah. Disarankan tetap gunakan <strong>Editor Kode HTML</strong>.</span>
            </div>
        </template>
    </div>

    <div x-show="mode === 'code'" class="bg-slate-900 border border-slate-800 text-slate-200 text-xs p-3 rounded-xl space-y-1">
        <div class="flex items-center gap-2 font-bold text-amber-400">
            <i class="fa-solid fa-code text-amber-400"></i>
            <span>Mode Editor Kode HTML (Untuk Tim IT / Custom Layout):</span>
        </div>
        <p class="text-slate-300 leading-relaxed pl-6">
            Tempat bebas untuk mengedit kode HTML, class Tailwind CSS (`grid`, `flex`, `card`), iframe video/maps, atau elemen custom lainnya.
        </p>
    </div>

    <!-- Hidden Input for Form Submission -->
    <textarea name="{{ $name }}" x-model="content" class="hidden" {{ $required ? 'required' : '' }}></textarea>

    <!-- Main Container Box -->
    <div class="border border-slate-300 rounded-xl overflow-hidden shadow-sm bg-white">
        
        <!-- Toolbar Formatting (Shown in Visual Mode) -->
        <div x-show="mode === 'visual'" class="bg-slate-100 border-b border-slate-200 p-2 flex flex-wrap items-center gap-1 text-xs select-none">
            
            <!-- Headings -->
            <button type="button" @click="exec('formatBlock', '<h2>')" title="Judul Utama (H2)" class="px-2.5 py-1 rounded hover:bg-slate-200 font-bold text-slate-700 border border-slate-300 bg-white">
                H2
            </button>
            <button type="button" @click="exec('formatBlock', '<h3>')" title="Sub Judul (H3)" class="px-2.5 py-1 rounded hover:bg-slate-200 font-bold text-slate-700 border border-slate-300 bg-white">
                H3
            </button>
            <button type="button" @click="exec('formatBlock', '<h4>')" title="Judul Kecil (H4)" class="px-2.5 py-1 rounded hover:bg-slate-200 font-bold text-slate-700 border border-slate-300 bg-white">
                H4
            </button>
            <button type="button" @click="exec('formatBlock', '<p>')" title="Paragraf Normal" class="px-2.5 py-1 rounded hover:bg-slate-200 font-medium text-slate-600 border border-slate-300 bg-white">
                Teks Normal
            </button>

            <div class="h-5 w-px bg-slate-300 mx-1"></div>

            <!-- Formatting Actions -->
            <button type="button" @click="exec('bold')" title="Tebal (Bold)" class="w-8 h-8 rounded hover:bg-slate-200 font-extrabold text-slate-800 border border-slate-300 bg-white flex items-center justify-center">
                B
            </button>
            <button type="button" @click="exec('italic')" title="Miring (Italic)" class="w-8 h-8 rounded hover:bg-slate-200 italic font-bold text-slate-800 border border-slate-300 bg-white flex items-center justify-center">
                I
            </button>
            <button type="button" @click="exec('underline')" title="Garis Bawah (Underline)" class="w-8 h-8 rounded hover:bg-slate-200 underline font-bold text-slate-800 border border-slate-300 bg-white flex items-center justify-center">
                U
            </button>
            <button type="button" @click="exec('strikeThrough')" title="Coret (Strikethrough)" class="w-8 h-8 rounded hover:bg-slate-200 line-through font-bold text-slate-800 border border-slate-300 bg-white flex items-center justify-center">
                S
            </button>

            <div class="h-5 w-px bg-slate-300 mx-1"></div>

            <!-- Lists -->
            <button type="button" @click="exec('insertUnorderedList')" title="List Poin (Bulleted List)" class="w-8 h-8 rounded hover:bg-slate-200 text-slate-700 border border-slate-300 bg-white flex items-center justify-center">
                <i class="fa-solid fa-list-ul"></i>
            </button>
            <button type="button" @click="exec('insertOrderedList')" title="List Angka (Numbered List)" class="w-8 h-8 rounded hover:bg-slate-200 text-slate-700 border border-slate-300 bg-white flex items-center justify-center">
                <i class="fa-solid fa-list-ol"></i>
            </button>

            <div class="h-5 w-px bg-slate-300 mx-1"></div>

            <!-- Alignment -->
            <button type="button" @click="exec('justifyLeft')" title="Rata Kiri" class="w-8 h-8 rounded hover:bg-slate-200 text-slate-700 border border-slate-300 bg-white flex items-center justify-center">
                <i class="fa-solid fa-align-left"></i>
            </button>
            <button type="button" @click="exec('justifyCenter')" title="Rata Tengah" class="w-8 h-8 rounded hover:bg-slate-200 text-slate-700 border border-slate-300 bg-white flex items-center justify-center">
                <i class="fa-solid fa-align-center"></i>
            </button>
            <button type="button" @click="exec('justifyRight')" title="Rata Kanan" class="w-8 h-8 rounded hover:bg-slate-200 text-slate-700 border border-slate-300 bg-white flex items-center justify-center">
                <i class="fa-solid fa-align-right"></i>
            </button>
            <button type="button" @click="exec('justifyFull')" title="Rata Kanan Kiri (Justify)" class="w-8 h-8 rounded hover:bg-slate-200 text-slate-700 border border-slate-300 bg-white flex items-center justify-center">
                <i class="fa-solid fa-align-justify"></i>
            </button>

            <div class="h-5 w-px bg-slate-300 mx-1"></div>

            <!-- Quote, Link, Table -->
            <button type="button" @click="exec('formatBlock', '<blockquote>')" title="Sisipkan Kutipan (Quote)" class="w-8 h-8 rounded hover:bg-slate-200 text-blue-700 border border-slate-300 bg-white flex items-center justify-center">
                <i class="fa-solid fa-quote-left"></i>
            </button>
            <button type="button" @click="insertLink()" title="Sisipkan Link Website" class="w-8 h-8 rounded hover:bg-slate-200 text-blue-700 border border-slate-300 bg-white flex items-center justify-center">
                <i class="fa-solid fa-link"></i>
            </button>
            <button type="button" @click="exec('unlink')" title="Hapus Link" class="w-8 h-8 rounded hover:bg-slate-200 text-red-600 border border-slate-300 bg-white flex items-center justify-center">
                <i class="fa-solid fa-link-slash"></i>
            </button>
            <button type="button" @click="insertTable()" title="Sisipkan Tabel Sederhana" class="px-2 py-1 rounded hover:bg-slate-200 font-bold text-slate-700 border border-slate-300 bg-white flex items-center gap-1">
                <i class="fa-solid fa-table text-emerald-600"></i> Tabel
            </button>

            <div class="h-5 w-px bg-slate-300 mx-1"></div>

            <!-- Colors -->
            <div class="flex items-center gap-1 px-1">
                <button type="button" @click="exec('foreColor', '#1e293b')" title="Warna Gelap" class="w-5 h-5 rounded-full bg-slate-800 border border-slate-300 hover:scale-110 transition"></button>
                <button type="button" @click="exec('foreColor', '#1d4ed8')" title="Warna Biru Kampus" class="w-5 h-5 rounded-full bg-blue-700 border border-slate-300 hover:scale-110 transition"></button>
                <button type="button" @click="exec('foreColor', '#dc2626')" title="Warna Merah" class="w-5 h-5 rounded-full bg-red-600 border border-slate-300 hover:scale-110 transition"></button>
                <button type="button" @click="exec('foreColor', '#16a34a')" title="Warna Hijau" class="w-5 h-5 rounded-full bg-emerald-600 border border-slate-300 hover:scale-110 transition"></button>
            </div>

            <div class="h-5 w-px bg-slate-300 mx-1"></div>

            <!-- Clear formatting -->
            <button type="button" @click="exec('removeFormat')" title="Hapus Format Teks" class="w-8 h-8 rounded hover:bg-slate-200 text-amber-600 border border-slate-300 bg-white flex items-center justify-center">
                <i class="fa-solid fa-eraser"></i>
            </button>
        </div>

        <!-- Mode Visual Content Editable Box -->
        <div x-show="mode === 'visual'" 
             x-ref="visualEditor" 
             contenteditable="true" 
             @input="updateFromVisual()" 
             @keyup="updateFromVisual()" 
             @blur="updateFromVisual()" 
             class="editor-visual-content font-sans focus:bg-slate-50/50 transition">
        </div>

        <!-- Mode HTML Textarea Box -->
        <div x-show="mode === 'code'">
            <textarea x-model="content" 
                      @input="updateFromCode()" 
                      rows="{{ $rows }}" 
                      placeholder="{{ $placeholder }}"
                      class="w-full p-4 bg-slate-900 text-sky-300 font-mono text-xs leading-relaxed focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-b-xl border-none resize-y"></textarea>
        </div>
    </div>
</div>
