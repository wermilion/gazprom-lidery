import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import {
    Modal,
    Ripple,
    initTE,
} from "tw-elements";

initTE({ Modal, Ripple });
