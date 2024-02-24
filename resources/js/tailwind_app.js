require("./bootstrap");
import Alpine from "alpinejs";
import flatpickr from "flatpickr";
import { FilePond } from "filepond";
import { createPopper } from "@popperjs/core";
import $ from "jquery";

window.toastr = require("toastr");

Alpine.start();

window.flatpickr = flatpickr;
window.FilePond = FilePond;
window.createPopper = createPopper;
window.Alpine = Alpine;
window.$ = window.jQuery = $;
