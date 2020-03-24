/**
 * Created with JetBrains WebStorm.
 * User: Sebit
 * Date: 10/2/13
 * Time: 8:11 PM
 * To change this template use File | Settings | File Templates.
 */
var SlideTree = function (data, container, initTitle, innerMostClickFunction) {
    var _this = this;
    _this.treeData = data;
    _this.givenContainer = container;
    _this.backEnabled = true;
    _this.initTitle = initTitle;
    _this.innerMostClickFunction = innerMostClickFunction;

    _this.textMeasurementContainer = $(GenerateDomElement({
        nodeType: "span",
        id: "textMeasurementContainer"
    }));

    _this.sliderElement = $(GenerateDomElement({
        nodeType: "div",
        classNames: "slideTreeMain"
    }));

    _this.mainContainerCover = $(GenerateDomElement({
        nodeType: "div",
        classNames: "slideTree"
    }));

    _this.mainPrevContainerContainer = $(GenerateDomElement({
        nodeType: "div",
        classNames: "slideTreePrevContainer"
    }));

    _this.mainContainer = $(GenerateDomElement({
        nodeType: "div",
        classNames: "slideTreeInnerInnerCover"
    }));

    _this.mainContainerFirstInner = $(GenerateDomElement({
        nodeType: "div",
        classNames: "slideTreeInnerCover"
    }));

    _this.mainPrevContainerContainer.append(_this.mainContainer);
    _this.mainContainerFirstInner.append(_this.mainPrevContainerContainer);
    _this.mainContainerCover.append(_this.mainContainerFirstInner);

    _this.headerContainerOutSide = $(GenerateDomElement({
        nodeType: "div",
        classNames: "slideTreeHeader"
    }));

    _this.headerContainer = $(GenerateDomElement({
        nodeType: "div",
        classNames: "slideTreeHeaderInside"
    }));


    _this.backButton = $(GenerateDomElement({
        nodeType: "div",
        classNames: ["slideBackWards", "fa", "fa fa-chevron-left", "passive"]
    }));

    _this.slideTitle = $(GenerateDomElement({
        nodeType: "span",
        classNames: ["slideTitle"],
        htmlContent: (_this.initTitle) ? _this.initTitle : ""
    }));

    _this.headerContainerOutSide.append(_this.headerContainer);
    _this.headerContainer.append(_this.backButton);
    _this.headerContainer.append(_this.slideTitle);
    _this.sliderElement.append(_this.headerContainerOutSide);
    _this.sliderElement.append(_this.mainContainerCover);

    _this.subNodeContainers = new Object();

    _this.firstNodesContainer = $(GenerateDomElement({
        nodeType: "div",
        classNames: "slideTreeNodesContainer"
    }));


    _this.fillNodeList = function (_container, data) {

        for (var i = 0; i < data.length; i++) {

            var _nodeItem = GenerateDomElement({
                nodeType: "div",
                classNames: "slideTreeNode",
                attributes: {"hassubnode": (data[i].childNodes != undefined && data[i].childNodes.length > 0).toString()},
                htmlContent: "<span class='slideTreeNodeText'>" + data[i].name.truncate(35) + "</span>"
                
            });

            _nodeItem.nodeID = data[i].id;
            _nodeItem.context = data[i].context;
            
            _nodeItem.haschildNodes = (data[i].childNodes != undefined && data[i].childNodes.length > 0);

            _container.append(_nodeItem);

            $(_nodeItem).on("click", function () {
//                $(this).parent().find(".selected").not(this).removeClass("selected");
                if (this.haschildNodes) {


                    var headername = $(this).children(".slideTreeNodeText").text();
                    var __nodeItem = GenerateDomElement({
                        nodeType: "span",
                        classNames: "titleInfoNode",
                        htmlContent: "<span class='slideTreeNodeText'>" + headername + "</span>"
                    });

                    $(__nodeItem).on("click", function () {
                        _this.goBackIndexed($(this));
                    });

                    _this.mainContainerCover.before(__nodeItem);
                    setTimeout(function () {
                        $(__nodeItem).css("opacity", "1");
                        $(__nodeItem).css("height", "60px");

                        setTimeout(function () {
                            _this.mainContainer.height(_this.mainContainerFirstInner.height());
                        }, 150);


                    }, 80);

                    /*****TITLE NODE*****/


                    var __this = this;
                    setTimeout(function () {
                        _this.backButton.removeClass("passive");
                        if (_this.subNodeContainers["snc_" + __this.nodeID] != undefined) {
                            _this.mainContainer.append(_this.subNodeContainers["snc_" + __this.nodeID]);
                            var _tmp = _this.subNodeContainers["snc_" + __this.nodeID];
                            setTimeout(function () {
                                _tmp.addClass("inView");
                                _tmp = null;
                            }, 10);
                            _this.subNodeContainers["snc_" + __this.nodeID].prev().addClass("outView").removeClass("inView");
                        }
                        else {
                            var _subNodeList = _this.findchildNodesOfNode(__this.nodeID);


                            _this.subNodeContainers["snc_" + __this.nodeID] = $(GenerateDomElement({
                                nodeType: "div",
                                classNames: "slideTreeNodesContainer"
                            }));

                            _this.subNodeContainers["snc_" + __this.nodeID][0].nodeID = __this.nodeID;
                            _this.fillNodeList(_this.subNodeContainers["snc_" + __this.nodeID], _subNodeList);

                            if (!_this.subNodeContainers["snc_" + __this.nodeID].hasClass('mCustomScrollBox')) {
                                _this.subNodeContainers["snc_" + __this.nodeID].mCustomScrollbar({
                                    scrollInertia: 100
                                });
                                setTimeout(function () {
                                    _this.subNodeContainers["snc_" + __this.nodeID].mCustomScrollbar("update");
                                }, 250);
                            }
                        }
                    }, 200);
                }
                else {
                    if (!$(this).hasClass("selected")) {

                        for (var key in _this.subNodeContainers) {
                            _this.subNodeContainers[key].find('.selected').removeClass("selected");
                        }
                        _this.sliderElement.find('.selected').removeClass("selected");

                        if (_this.innerMostClickFunction != undefined) {
                            _this.innerMostClickFunction(this.nodeID);
                        }
                    }


                    $(this).addClass("selected");
                }
            });
        }

        _this.mainContainer.append(_container);
        setTimeout(function () {
            _container.addClass("inView");
            _this.mainContainer.height(_this.mainContainerFirstInner.height());
        }, 10);

        _container.prev().addClass("outView").removeClass("inView");
    }


    _this.findchildNodesOfNode = function (_nid, _data) {
        _data = _data || _this.treeData;
        var _ndfnd = false;

        for (var i = 0; i < _data.length; i++) {
            if (_data[i].id == _nid) {
                _ndfnd = _data[i].childNodes;
                break;
            }
            else {
                if (_data[i].childNodes != undefined && _data[i].childNodes.length > 0) {
                    _ndfnd = _this.findchildNodesOfNode(_nid, _data[i].childNodes);
                    if (_ndfnd) {
                        break;
                    }
                }
            }

        }

        return _ndfnd;
    }

    _this.initialize = function () {
        setTimeout(function () {

            _this.fillNodeList(_this.firstNodesContainer, _this.treeData);

            _this.firstNodesContainer.mCustomScrollbar({
                scrollInertia: 100
            });
            setTimeout(function () {
                _this.firstNodesContainer.mCustomScrollbar("update");
            }, 250);

            _this.givenContainer.append(_this.sliderElement);

            _this.textMeasurementContainer.detach();

            _this.headerContainer.on("click", function () {
                var __nodeItem = $('.titleInfoNode');
                __nodeItem.css("opacity", "0");
                __nodeItem.css("height", "0px");
                var _prevCount = __nodeItem.length;
                if (_this.backEnabled && _this.mainContainer.children('.slideTreeNodesContainer').length > 1) {
                    _this.backEnabled = false;
                    var _toberemovedids = $(_this.mainContainer.children(".slideTreeNodesContainer").slice(-1 * _prevCount)).removeClass("inView").removeClass("outView");
                    setTimeout(function () {
                        _this.mainContainer.children(".slideTreeNodesContainer.outView:last").addClass("inView").removeClass("outView");
                        setTimeout(function () {
                            $(__nodeItem).remove();
                            _toberemovedids.detach();
                            _this.mainContainer.height(_this.mainContainerFirstInner.height());
                            _this.backEnabled = true;
                        }, 300);
                    }, 10);
                }
                _this.backButton.addClass("passive");
                _this.backEnabled = false;
            });
        }, 100);

        $(window).resize(function () {
            _this.mainContainer.height(_this.mainContainerFirstInner.height());
        });

        _this.goBackIndexed = function (_i) {
            var __nodeItem = _i.nextAll('.titleInfoNode');
            if (__nodeItem.length == 0) {
                return false;
            }
            __nodeItem.css("opacity", "0");
            __nodeItem.css("height", "0px");
            var _prevCount = __nodeItem.length;

            if (_this.backEnabled && _this.mainContainer.children('.slideTreeNodesContainer').length > 1) {
                _this.backEnabled = false;
                var _toberemovedids = $(_this.mainContainer.children(".slideTreeNodesContainer").slice(-1 * _prevCount)).removeClass("inView").removeClass("outView");
                setTimeout(function () {
                    _this.mainContainer.children(".slideTreeNodesContainer.outView:last").addClass("inView").removeClass("outView");

                    setTimeout(function () {
                        $(__nodeItem).remove();
                        _toberemovedids.detach();

                        _this.mainContainer.height(_this.mainContainerFirstInner.height());

                        _this.backEnabled = true;
                    }, 300);

                }, 10);

            }
            
            if (_this.mainContainer.children('.slideTreeNodesContainer').length > 2) {
                _this.backButton.removeClass("passive");
            }
            else {
                _this.backButton.addClass("passive");
            }
        }
    }
}


/**
 * Created with JetBrains WebStorm.
 * User: Sebit
 * Date: 10/2/13
 * Time: 8:11 PM
 * To change this template use File | Settings | File Templates.
 */
