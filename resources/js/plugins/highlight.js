import hljs from "highlight.js";
import "highlight.js/styles/github-dark.css"; // Use github dark theme

// Load all highlight after page load
$(function(){
    hljs.highlightAll();
})