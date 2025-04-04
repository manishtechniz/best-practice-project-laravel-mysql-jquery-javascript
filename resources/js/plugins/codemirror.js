import { EditorState } from "@codemirror/state";
import { EditorView } from "@codemirror/view";
import { javascript } from "@codemirror/lang-javascript";
import { basicSetup } from "codemirror"

// Init Editor state
const startState = EditorState.create({
  doc: '', // leave editor empty
  extensions: [basicSetup, javascript()],
});

window.addEventListener('load', function(){
    window.allViews = [];

    // Init Editor view
    document.querySelectorAll(".editor").forEach(element => {
        let view = new EditorView({
            state: startState,
            parent: element,
        });
    
        allViews.push(view);
    });
})
