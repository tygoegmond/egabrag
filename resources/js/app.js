import './bootstrap';

import Alpine from 'alpinejs';
import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';

window.EditorJS = EditorJS;
window.EditorJS.Header = Header;

window.Alpine = Alpine;

Alpine.start();
