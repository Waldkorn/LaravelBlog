var mceEditor;
tinymce.init({ selector:'textarea',
init_instance_callback : function(editor) {
    mceEditor = editor;

    mceEditor.on('keyup', function(e){
      var bookmark = mceEditor.selection.getBookmark();
      var expandedText = expandText(mceEditor.getContent({format: 'raw'}))
      mceEditor.setContent(expandedText, {format: 'raw'});
      mceEditor.selection.moveToBookmark(bookmark);
      mceEditor.dom.remove(bookmark.id + "_start");
    });
  },
  height: "380",
  resize: false
});

var shortcuts = [
    {shortcut: "CG", replacement: "CodeGorilla"},
    {shortcut: "gn", replacement: "Groningen"}
];

function expandText(text){
   for (var i = 0; i < shortcuts.length; i++){
        text = text.replace(new RegExp("\\b" + shortcuts[i].shortcut + "\\b", 'g'), shortcuts[i].replacement);
    }

    return text;
}