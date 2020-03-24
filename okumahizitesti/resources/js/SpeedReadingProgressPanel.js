function wmpProgressMenu() {

    var addDOM = function (_type, _container, _id, _class) {
        var dom = this.createDOM(_type, _id, _class);
        _container.append(dom);
        return dom;
    };

    var createDOM = function (_type, _id, _class) {
        var dom = $(document.createElement(_type))
        if (typeof _id != "undefined" && _id.trim() != "") dom.attr("id", _id.trim());
        if (typeof _class != "undefined" && _class.trim() != "") dom.attr("class", _class.trim());

        return dom;

    };


/*    var glass =  addDOM("div", $("#sbt_bodyContainer"), "speed_reading_interaction_glass", "speed_reading_interaction_glass");*/

    var mainContainer =  addDOM("div", $("#sbt_bodyContainer"), "mainWpmProgressMenuContainer", "mainWpmProgressMenuContainer");

    var progressContainer =  addDOM("div", $(mainContainer), "progressContainer", "menuContainer");
    var progress = $("#progressContainer").percentageLoader({ width: 100, height: 100, controllable: false, progress: 0, onProgressUpdate: this.update });

    var WPMContainer =  addDOM("div", $(mainContainer), "WPMContainer", "menuContainer");
    var WPMText =  addDOM("div", $(WPMContainer), "wpmText", "wpmText");

    this.showWPM = function (value) {
        $(WPMText).html("Okuma<br/>Hızınız<br/>" + "<b>" + value + "</b> k/dk");
    }

    this.updateProgress = function (value, wordCount) {
        progress.setProgress(value);
        progress.setValue(wordCount + " kelime");
    }


}

function SwipePanel() {

    var OPENED = "panelOpened";
    var CLOSED = "panelClosed";


    var movementArea =  addDOM("div", $("#sbt_bodyContainer"), "movementArea", "movementArea");
    var container =  addDOM("div", $(movementArea), "swipeContainer", "swipeContainer");
    var handle =  addDOM("div", $(container), "swipeHandle", "fa fa-book fa-4");
    this.swipe = new Sbt_1.Swipe({
        containerID: "movementArea",
        dragID: "swipeContainer",
        handleID: "swipeHandle",
        isGlass: false
    });

}
