
!function($,window,document,undefined){function Plugin(element,options){this.w=$(document),this.$instance=$(element),this.options=$.extend(!0,{},defaults,options),this.init()}function PublicPlugin(plugin,lists){if(!plugin)throw new TypeError("expected object, got "+typeof plugin);this._plugin=plugin,this._lists=lists}var hasTouch="ontouchstart"in document;String.prototype.dot=function(){return"."+this},String.prototype.eachHas=function(chunk,knife,innerGlue,outerGlue){var subject=this,opt=[],knife=knife||", ",innerGlue=innerGlue||" ",outerGlue=outerGlue||knife,chunks=chunk.split(knife);return chunks.forEach(function(chunk,c){opt.push(subject+innerGlue+chunk)}),opt.join(outerGlue)},String.prototype.padLength=function(val,minLength){for(var subject=this;subject.length<minLength;)subject=val+subject;return subject},String.prototype.join=function(sibling,delimiter){var delimiter="string"==typeof delimiter?delimiter:" ";return this+delimiter+sibling},Function.prototype.setName=function(name){return Object.defineProperty(this,"name",{get:function(){return name}}),this},Function.prototype.clone=function(){var newfun=new Function("return "+this.toString())();for(var key in this)newfun[key]=this[key];return newfun};var hasPointerEvents=function(){var el=document.createElement("div"),docEl=document.documentElement;if(!("pointerEvents"in el.style))return!1;el.style.pointerEvents="auto",el.style.pointerEvents="x",docEl.appendChild(el);var supports=window.getComputedStyle&&"auto"===window.getComputedStyle(el,"").pointerEvents;return docEl.removeChild(el),!!supports}(),defaults={listNodeName:"ol",itemNodeName:"li",rootClass:"dd",listClass:"dd-list",itemClass:"dd-item",itemBlueprintClass:"dd-item-blueprint",dragClass:"dd-dragel",handleClass:"dd-handle",collapsedClass:"dd-collapsed",placeClass:"dd-placeholder",noDragClass:"dd-nodrag",emptyClass:"dd-empty",contentClass:"dd3-content",itemAddBtnClass:"item-add",removeBtnClass:"item-remove",itemRemoveBtnConfirmClass:"confirm-class",addBtnSelector:"",addBtnClass:"dd-new-item",editBoxClass:"dd-edit-box",inputSelector:"input, select, textarea",collapseBtnClass:"collapse",expandBtnClass:"expand",endEditBtnClass:"end-edit",itemBtnContainerClass:"dd-button-container",itemNameClass:"item-name",data:"",allowListMerging:!1,select2:{support:!1,selectWidth:"45%",params:{}},slideAnimationDuration:0,maxDepth:5,threshold:15,refuseConfirmDelay:2e3,newItemFadeIn:350,event:{onToJson:[],onParseJson:[],onSaveEditBoxInput:[],onItemDrag:[],onItemAddChildItem:[],onItemDrop:[],onItemAdded:[],onItemExpanded:[],onItemCollapsed:[],onItemRemoved:[],onItemStartEdit:[],onItemEndEdit:[],onCreateItem:[],onItemMaxDepth:[],onItemSetParent:[],onItemUnsetParent:[]},paramsDataKey:"__domenu_params"};Plugin.prototype={init:function(){var plugin=this,opt=this.options;plugin.reset(),plugin.$placeholder=$('<div class="'+plugin.options.placeClass+'"/>'),$.each(this.$instance.find(plugin.options.itemNodeName),function(k,el){plugin.setParent($(el))}),plugin.$instance.on("click","button",function(e){if(!plugin.$dragItem){var target=$(e.currentTarget),action=target.data("action"),item=target.parent(plugin.options.itemNodeName);"collapse"===action&&plugin.collapseItem(item),"expand"===action&&plugin.expandItem(item)}});var onStartEvent=function(e){var handle=$(e.target);if(!handle.hasClass(plugin.options.handleClass)){if(handle.closest(plugin.options.noDragClass.dot()).length)return;handle=handle.closest(plugin.options.handleClass.dot())}handle.length&&!plugin.$dragItem&&(plugin.isTouch=/^touch/.test(e.type),plugin.isTouch&&1!==e.touches.length||(e.preventDefault(),plugin.dragStart(e.touches?e.touches[0]:e)))},onMoveEvent=function(e){plugin.$dragItem&&(e.preventDefault(),plugin.dragMove(e.touches?e.touches[0]:e))},onEndEvent=function(e){plugin.$dragItem&&(e.preventDefault(),plugin.dragStop(e.touches?e.touches[0]:e))};hasTouch&&(plugin.$instance[0].addEventListener("touchstart",onStartEvent,!1),window.addEventListener("touchmove",onMoveEvent,!1),window.addEventListener("touchend",onEndEvent,!1),window.addEventListener("touchcancel",onEndEvent,!1)),plugin.$instance.on("mousedown",onStartEvent),plugin.w.on("mousemove",onMoveEvent),plugin.w.on("mouseup",onEndEvent),opt.addBtnSelector?this.addNewListItemListener($(opt.addBtnSelector)):this.addNewListItemListener(this.$instance.find(opt.addBtnClass.dot()))},addNewListItemListener:function(addBtn,parent){var _this=this,opt=this.options;addBtn.on("click",function(e){var list=_this.$instance.find(opt.listClass.dot()).first(),item=_this.createNewListItem();item&&(item.css("display","none"),list.prepend(item),item.fadeIn(opt.newItemFadeIn),_this.options.event.onItemAdded.forEach(function(cb,i){cb($(item),e)}))})},clickEndEditEventHandler:function(item){var _this=this,opt=_this.options,endEditBtn=item.find(opt.endEditBtnClass.dot()).first();endEditBtn.on("click",null,{forced:!0},_this.keypressEnterEndEditEventHandler.bind(_this))},clickStartEditEventHandler:function(event){var opt=this.options,_this=this,item=$(event.target).parents(opt.itemClass.dot()).first(),spn=item.find(opt.itemNameClass.dot()).first(),firstInput=item.find(opt.inputSelector).first(),btnContainer=item.find(opt.itemBtnContainerClass.dot()).first(),edtBox=item.find(opt.editBoxClass.dot()).first(),igniteKeypressEnterEndEditEventHandler=function(el){el.each(function(c,item){var item=$(item),keypressEnterEndEditEventHandler=_this.keypressEnterEndEditEventHandler;item.data("domenu_keypressEnterEndEditEventHandler")||(item.data("domenu_keypressEnterEndEditEventHandler",!0),item.on("keypress",keypressEnterEndEditEventHandler.bind(_this)))})};item.data("domenu_clickEndEditEventHandler")!==!0&&(_this.clickEndEditEventHandler(item),item.data("domenu_clickEndEditEventHandler",!0)),spn.stop().hide(opt.slideAnimationDuration,function(){"SELECT"!==firstInput.get(0).nodeName?firstInput.val(spn.text()):firstInput.val(firstInput.find("option:contains("+spn.text()+")").val()),btnContainer.stop().hide(opt.slideAnimationDuration,function(){edtBox.stop().show(opt.slideAnimationDuration,function(){edtBox.children().first("input").select().focus(),igniteKeypressEnterEndEditEventHandler(item)})})}),opt.event.onItemStartEdit.forEach(function(cb,i){cb(item,event)})},resolveToken:function(token,input){if("string"==typeof token){for(var out=token,tagRegex=/\{\?[a-z\-\.]+\}/gi,tags=out.match(tagRegex),tagsCount=tags&&tags.length||0,currentTag=0;tagsCount>currentTag;currentTag++)switch(tags[currentTag]){case"{?date.gregorian-slashed-DMY}":var dateTime=new Date(Date.now()),date=dateTime.getDay().toString().padLength("0",2)+"/"+dateTime.getMonth().toString().padLength("0",2)+"/"+dateTime.getFullYear();out=out.replace(tags[currentTag],date);break;case"{?date.mysql-datetime}":var date=new Date(Date.now());date=date.getUTCFullYear()+"-"+("00"+(date.getUTCMonth()+1)).slice(-2)+"-"+("00"+date.getUTCDate()).slice(-2)+" "+("00"+date.getUTCHours()).slice(-2)+":"+("00"+date.getUTCMinutes()).slice(-2)+":"+("00"+date.getUTCSeconds()).slice(-2),out=out.replace(tags[currentTag],date);break;case"{?numeric.increment}":this.incrementIncrement=this.incrementIncrement||1,out=out.replace(tags[currentTag],this.incrementIncrement),this.incrementIncrement+=1;break;case"{?value}":out=out.replace(tags[currentTag],input.value);break;default:out=token}return out}},saveEditBoxInput:function(inputCollection){var $item,_this=this,opt=this.options;inputCollection.each(function(c,input){var itemDataValue=$(input).parents(opt.itemClass.dot().join(",").join(opt.itemBlueprintClass.dot())).first().data(input.getAttribute("name")),inputDefaultValue=$(input).data("default-value")||"";if($item=$(input).parents(opt.itemClass.dot()).first(),!itemDataValue&&!input.value)var tokenizedDefault=_this.resolveToken(inputDefaultValue,$(input));$item.data(input.getAttribute("name"),$(input).val()||itemDataValue||tokenizedDefault)}),opt.event.onSaveEditBoxInput.forEach(function(cb,i){cb($item,inputCollection)})},keypressEnterEndEditEventHandler:function(event){var _this=this,opt=this.options,item=$(event.target).parents(opt.itemClass.dot()).first(),edtBox=item.find(opt.editBoxClass.dot()).first(),inputCollection=item.find(opt.inputSelector),spn=item.find("span").first(),btnContainer=item.find(opt.itemBtnContainerClass.dot()).first();(13===event.keyCode||event.data&&event.data.forced&&event.data.forced===!0)&&(_this.determineAndSetItemTitle(item),""===spn.text()&&spn.text(_this.determineAndSetItemTitle(item)),edtBox.stop().slideUp(opt.slideAnimationDuration,function(){_this.saveEditBoxInput(inputCollection),btnContainer.attr("style",""),opt.event.onItemEndEdit.forEach(function(cb,i){cb($(item),event)}),spn.stop().slideDown(opt.slideAnimationDuration)}))},resolveInputDataEntryByName:function(name){var item=this.$instance;opt=this.options,item.find(opt.editBoxClass.dot().join(opt.inputSelector)).each(function(i,input){return input.getAttribute("name")===name?$(input).data("name"):void 0})},setItemTitle:function(item,title){var opt=this.options;item.find(opt.contentClass.dot().join("span")).first().text(title)},determineAndSetItemTitle:function(item){var _this=this,opt=this.options,firstInput=item.find(opt.inputSelector).first(),firstInputText=firstInput.find("option:selected").first().text()||firstInput.text(),firstInputValue=item.find(opt.editBoxClass.dot().eachHas(opt.inputSelector)).first().val(),itemDataValue=item.data(item.find(opt.inputSelector).first().attr("name")),firstEditBoxInputPlaceholderValue=item.find(opt.editBoxClass.dot().eachHas(opt.inputSelector)).first().attr("placeholder"),firstEditBoxInputDataPlaceholderValue=item.find(opt.editBoxClass.dot().eachHas(opt.inputSelector)).first().data("placeholder"),choice=firstInputText||firstInputValue||itemDataValue||_this.resolveToken(firstEditBoxInputDataPlaceholderValue)||firstEditBoxInputPlaceholderValue;item.find(opt.contentClass.dot().join("span")).first().text(choice)},setInputCollectionPlaceholders:function(item,inputCollection){var _this=this;$(inputCollection).each(function(c,input){if("SELECT"===input.nodeName){$(input).find('option[selected="selected"]').removeAttr("selected");var selectedOption=$(input).find('option[value="'+item.data($(input).attr("name"))+'"]');if(0!==selectedOption.length)selectedOption.attr("selected","selected");else{if(!item.data($(input).attr("name")))return;$(input).append('<option value="'+item.data($(input).attr("name"))+'">'+item.data($(input).attr("name"))+"</option>")}}$(input).attr("placeholder",_this.resolveToken($(input).data("placeholder"),$(input))||$(input).attr("placeholder")),$(input).val(item.data($(input).attr("name")))})},createNewListItem:function(data){var _this=this,el=this.$instance,opt=this.options,blueprint=el.find(opt.itemBlueprintClass.dot()).first().clone(),inputCollection=blueprint.find(opt.editBoxClass.dot()).find(opt.inputSelector);blueprint.remove=function(){var parent=blueprint.parents(_this.options.itemClass.dot()).first(),id=blueprint.data("id");jQuery(this).remove(),_this.unsetEmptyParent(parent),jQuery.each(opt.event.onItemRemoved,function(i,cb){cb(blueprint,id)})},blueprint.setParameter=function(key,value){blueprint.data(opt.paramsDataKey,$.extend(!0,blueprint.data(opt.paramsDataKey),{key:value}))},blueprint.getParameter=function(key){return blueprint.data(key)},$.each(data||{},function(key,value){blueprint.data(key,value)}),blueprint.data("id",blueprint.data("id")||_this.getHighestId()+1);var currentBlueprintClass=blueprint.attr("class"),blueprintClass=opt.itemClass+currentBlueprintClass.replace(opt.itemBlueprintClass,"");return blueprint.attr("class",blueprintClass),this.setInputCollectionPlaceholders(blueprint,inputCollection),this.saveEditBoxInput(inputCollection),this.determineAndSetItemTitle(blueprint),this.setInputCollectionPlaceholders(inputCollection),blueprint.find(opt.removeBtnClass.dot()).first().on("click",function(e){var rmvBtn=$(this),confirmClass=rmvBtn.data(opt.itemRemoveBtnConfirmClass);if(confirmClass)if(rmvBtn.hasClass(confirmClass))blueprint.remove();else{rmvBtn.addClass(confirmClass);setTimeout(function(){rmvBtn.removeClass(confirmClass)},opt.refuseConfirmDelay)}else blueprint.remove(),opt.event.onItemRemoved.forEach(function(cb,i){cb(blueprint,e)})}),blueprint.find(opt.itemAddBtnClass.dot()).first().on("click",function(event){_this.itemAddChildItem(blueprint),opt.event.onItemAdded.forEach(function(cb,i){cb(blueprint,event)}),opt.event.onItemAddChildItem.forEach(function(cb,i){cb(blueprint,event)})}),blueprint.find("span").first().get(0).addEventListener("click",_this.clickStartEditEventHandler.bind(this)),_this.options.select2.support&&(blueprint.find("select").css("width",_this.options.select2.selectWidth),blueprint.find("select").select2(_this.options.select2.params)),blueprint.data(opt.paramsDataKey,blueprint.data(opt.paramsDataKey)||{}),opt.event.onCreateItem.forEach(function(cb,i){var callbackResponse=cb(blueprint,blueprint.data());blueprint="undefined"==typeof callbackResponse?blueprint:callbackResponse}),blueprint},itemAddChildItem:function($parentElement){var listElement,_this=this,opt=_this.options,$newItem=_this.createNewListItem();if($newItem){if($parentElement.parents(opt.listClass.dot()).length>opt.maxDepth){var $addButton=$parentElement.find(opt.itemAddBtnClass.dot());return $addButton.addClass(opt.removeBtnClass),setTimeout(function(){$addButton.removeClass(opt.removeBtnClass)},opt.refuseConfirmDelay),void opt.event.onItemMaxDepth.forEach(function(cb,i){cb()})}$parentElement.children(opt.listClass.dot()).length?$parentElement.children(opt.listClass.dot()).first().append($newItem):(listElement=$("<"+opt.listNodeName+"/>").addClass(opt.listClass),listElement.append($newItem),$parentElement.append(listElement)),_this.setParent($parentElement)}},getHighestId:function(){var opt=this.options,el=this.$instance,id=0;return el.find(opt.itemNodeName).each(function(i,e){var eId=$(e).data("id");return eId>id?id=eId:void 0}),id},serialize:function(){this.options.event.onToJson.forEach(function(cb,i){cb()});var data,depth=0,list=this;return step=function(level,depth){var array=[],items=level.children(list.options.itemNodeName);return items.each(function(){var li=$(this),sub=li.children(list.options.listNodeName),filteredData={};$.each(li.data(),function(key,i){0!==key.indexOf("domenu_")&&(filteredData[key]=li.data(key))});var item=$.extend({},filteredData);sub.length&&(item.children=step(sub,depth+1)),array.push(item)}),array},data=step(list.$instance.find(list.options.listNodeName).first(),depth)},deserialize:function(data,override){var data=JSON.parse(data)||JSON.parse(this.options.data),_this=this,opt=this.options,list=_this.$instance.find(opt.listClass.dot()).first();override&&list.children().remove();var processItem=function(i,pref){if(i.children){var cref=$('<ol class="'+opt.listClass+'"></ol>'),item=_this.createNewListItem(i);if(!item)return;pref.append(item),item.append(cref),_this.setParent(item,!0),jQuery.each(i.children,function(i,e){processItem(e,cref)})}else{var item=_this.createNewListItem(i);if(!item)return;pref.append(item)}};jQuery.each(data,function(i,e){processItem(e,list)}),_this.$instance.find(_this.options.itemClass.dot()).each(function(i,item){$(item).data(_this.options.paramsDataKey).collapsed&&_this.collapseItem($(item))}),this.options.event.onParseJson.forEach(function(cb,i){cb()})},serialise:function(){return this.serialize()},reset:function(){this.mouse={offsetX:0,offsetY:0,startX:0,startY:0,lastX:0,lastY:0,nowX:0,nowY:0,lastCurrentDistXChange:0,lastCurrentDistYChange:0,isMovingOnXAxis:null,dirX:0,dirY:0,lastDirX:0,lastDirY:0,distAxX:0,distAxY:0,distXtotal:0,distYtotal:0},this.isTouch=!1,this.moving=!1,this.$dragItem=null,this.dragRootEl=null,this.dragDepth=0,this.hasNewRoot=!1,this.$pointEl=null},expandItem:function($item){$item.removeClass(this.options.collapsedClass),$item.children(this.options.listClass.dot()).children(this.options.itemClass.dot()).show(),$item.children(this.options.expandBtnClass.dot()).hide(),$item.children(this.options.collapseBtnClass.dot()).show(),$item.data(this.options.paramsDataKey,$.extend(!0,$item.data(this.options.paramsDataKey),{collapsed:!1})),this.options.event.onItemExpanded.forEach(function(cb,i){cb($item)})},collapseItem:function($item){$item.addClass(this.options.collapsedClass),$item.children(this.options.listClass.dot()).children(this.options.itemClass.dot()).hide(),$item.children(this.options.collapseBtnClass.dot()).hide(),$item.children(this.options.expandBtnClass.dot()).show(),$item.data(this.options.paramsDataKey,$.extend(!0,$item.data(this.options.paramsDataKey),{collapsed:!0})),this.options.event.onItemCollapsed.forEach(function(cb,i){cb($item)})},expandAll:function(cb){var list=this,recursiveExpand=function($item){if(cb&&cb($item)){list.expandItem($item);var listBag=$item.children(list.options.listNodeName);listBag.length&&jQuery.each(listBag,function(i,item){recursiveExpand($(item))})}};list.$instance.find(this.options.collapsedClass.dot()).each(function(e,item){recursiveExpand($(item))})},collapseAll:function(cb){var list=this,recursiveCollapse=function($item){if(cb&&cb($item)){var listBag=$item.children(list.options.listNodeName);listBag.length&&(list.collapseItem($item),jQuery.each(listBag,function(i,item){recursiveCollapse($(item))}))}};list.$instance.find(list.options.listNodeName).children(list.options.itemClass.dot()).each(function(e,item){recursiveCollapse($(item))})},setParent:function($item,force){var opt=this.options;if($item.children(this.options.listNodeName).length||force){$item.children('[data-action="collapse"]').show();var handle=$item.find(this.options.handleClass.dot()).first().clone();$item.find(this.options.handleClass.dot()).first().remove(),$item.prepend(handle)}$item.children('[data-action="expand"]').hide(),opt.event.onItemSetParent.forEach(function(cb,i){cb($item)})},unsetParent:function($item){var opt=this.options;$item.removeClass(this.options.collapsedClass),$item.children("[data-action]").hide(),$item.children(this.options.listNodeName).remove(),$item.removeData("children"),opt.event.onItemUnsetParent.forEach(function(cb,i){cb($item,event)})},unsetEmptyParent:function(parent){var _this=this;0===parent.find(this.options.itemClass.dot()).length&&_this.unsetParent(parent)},getChildrenCount:function($placeholder){return $placeholder.parents(this.options.listClass.dot()).length+this.$dragItem.find(this.options.listClass.dot()).length-1},updatePlaceholderMaxDepthApperance:function(){this.getChildrenCount(this.$placeholder)>=this.options.maxDepth?this.$placeholder.addClass("max-depth"):this.$placeholder.removeClass("max-depth")},dragStart:function(e){var mouse=this.mouse,opt=this.options,target=$(e.target),dragItem=target.closest(this.options.itemNodeName);dragItem.attr("class").match(opt.noDragClass)||(this.$placeholder.css("height",dragItem.height()),mouse.offsetX=e.offsetX!==undefined?e.offsetX:e.pageX-target.offset().left,mouse.offsetY=e.offsetY!==undefined?e.offsetY:e.pageY-target.offset().top,mouse.startX=mouse.lastX=e.pageX,mouse.startY=mouse.lastY=e.pageY,this.dragRootEl=this.$instance,this.$dragItem=$(document.createElement(this.options.listNodeName)).addClass(this.options.listClass+" "+this.options.dragClass),this.$dragItem.css("width",dragItem.width()),dragItem.after(this.$placeholder),dragItem[0].parentNode.removeChild(dragItem[0]),dragItem.appendTo(this.$dragItem),$(document.body).append(this.$dragItem),this.$dragItem.css({left:e.pageX-mouse.offsetX,top:e.pageY-mouse.offsetY}),this.updatePlaceholderMaxDepthApperance(),this.options.event.onItemDrag.forEach(function(cb,i){cb($(dragItem),e)}))},dragStop:function(e){var el=this.$dragItem.children(this.options.itemNodeName).first();el[0].parentNode.removeChild(el[0]),this.$placeholder.replaceWith(el),this.$dragItem.remove(),this.$instance.trigger("change"),this.hasNewRoot&&this.dragRootEl.trigger("change"),this.reset(),this.mouse.distXtotal=0,this.mouse.distYtotal=0,this.options.event.onItemDrop.forEach(function(cb,i){cb($(el),e)}),$(el).parents(this.options.rootClass).data("domenu-id")!==$(this.$instance).data("domenu-id")&&$(el).parents(this.options.rootClass.dot()).domenu()._plugin.options.event.onItemDrop.forEach(function(cb,i){cb(el,e)})},dragMove:function(e){function setTotalDistance(x,y){mouse.distXtotal=x,mouse.distYtotal=y,0==x&&(mouse.lastX=mouse.startX=mouse.nowX),0==y&&(mouse.lastY=mouse.startY=mouse.nowY)}var depth,$rootListOfPointingElement,hasRootChanged,opt=this.options,mouse=this.mouse;mouse.lastX=mouse.nowX||e.pageX,mouse.lastY=mouse.nowY||e.pageY,mouse.nowX=e.pageX,mouse.nowY=e.pageY,mouse.lastCurrentDistXChange=mouse.nowX-mouse.lastX,mouse.lastCurrentDistYChange=mouse.nowY-mouse.lastY,mouse.lastDirX=mouse.dirX,mouse.lastDirY=mouse.dirY,mouse.dirX=0===mouse.lastCurrentDistXChange?0:mouse.lastCurrentDistXChange>0?1:-1,mouse.dirY=0===mouse.lastCurrentDistYChange?0:mouse.lastCurrentDistYChange>0?1:-1;var placeElSPY=Math.abs(this.$placeholder.offset().top-this.$dragItem.offset().top),placeElSPX=Math.abs(this.$placeholder.offset().left-this.$dragItem.offset().left),placeElSEF=2/Math.PI*Math.atan(Math.PI/2*(placeElSPY+placeElSPX)*.1/opt.threshold);if(this.$dragItem.css({left:e.pageX-mouse.offsetX,top:e.pageY-mouse.offsetY}),this.$pointEl=$(document.elementFromPoint(e.pageX-document.body.scrollLeft,e.pageY-(window.pageYOffset||document.documentElement.scrollTop))),$rootListOfPointingElement=this.$pointEl.closest(opt.rootClass.dot()),hasRootChanged=this.dragRootEl.data("domenu-id")!==$rootListOfPointingElement.data("domenu-id"),$rootListOfPointingElement.length&&!hasRootChanged?this.$placeholder.css({opacity:1}):this.$placeholder.css({opacity:1-placeElSEF}),!(0===$rootListOfPointingElement.length&&placeElSEF>.4)){var isMovingOnXAxis=Math.abs(mouse.lastCurrentDistXChange)>Math.abs(mouse.lastCurrentDistYChange)&&Math.abs(mouse.lastCurrentDistXChange-mouse.lastCurrentDistYChange)>2;if(mouse.moving===!1&&(mouse.isMovingOnXAxis=isMovingOnXAxis,mouse.moving=!0),setTotalDistance(mouse.nowX-mouse.startX,mouse.nowY-mouse.startY),mouse.isMovingOnXAxis=isMovingOnXAxis,this.updatePlaceholderMaxDepthApperance(),0===this.$pointEl.parents(opt.rootClass.dot()).length&&setTotalDistance(0,0),Math.abs(mouse.distXtotal)>=opt.threshold){var $precedingSiblingItem=this.$placeholder.prev(opt.itemNodeName),$precedingSiblingItemList=$precedingSiblingItem.find(opt.listNodeName).last();if(mouse.distXtotal>0&&1===mouse.dirX&&$precedingSiblingItem.length>0&&!$precedingSiblingItem.hasClass(opt.collapsedClass))if(this.getChildrenCount(this.$placeholder)<opt.maxDepth)if($precedingSiblingItemList.length>0){var $lastItem=$precedingSiblingItem.children(opt.listNodeName).last();$lastItem.append(this.$placeholder),setTotalDistance(0,0)}else{var $list=$(document.createElement(opt.listNodeName)).addClass(opt.listClass);$list.append(this.$placeholder),$precedingSiblingItem.append($list),this.setParent($precedingSiblingItem),setTotalDistance(0,0)}else this.getChildrenCount(this.$placeholder)>=opt.maxDepth&&(this.updatePlaceholderMaxDepthApperance(),opt.event.onItemMaxDepth.forEach(function(cb,i){cb($precedingSiblingItem)}));else if(mouse.distXtotal<0&&-1===mouse.dirX){var $parent=this.$placeholder.parents(opt.itemClass.dot()).first();$parent.length&&($parent.after(this.$placeholder),0===$parent.children(opt.itemClass.dot()).length&&this.unsetEmptyParent($parent),setTotalDistance(0,0))}}if(hasPointerEvents||(this.$dragItem[0].style.visibility="hidden"),this.$instance.children(this.options.listClass.dot()).length||this.$instance.append($("<"+this.options.listNodeName+"/>").attr("class",this.options.listClass)),this.options.allowListMerging!==!0){if(hasRootChanged&&this.options.allowListMerging===!1)return;if(hasRootChanged&&$rootListOfPointingElement.data("domenu")&&-1===$rootListOfPointingElement.data("domenu").options.allowListMerging.indexOf(this.$instance.attr("id")))return}if(this.$pointEl.hasClass(opt.listClass)&&!this.$pointEl.children(opt.itemClass.dot()).length&&this.$pointEl.append(this.$placeholder),this.$pointEl.parents(opt.rootClass.dot()).length&&!this.$pointEl.hasClass(opt.listClass)&&!this.$pointEl.hasClass(opt.placeClass)){if(this.$pointEl.hasClass(opt.itemClass)||(this.$pointEl=$(this.$pointEl).parents(opt.itemClass.dot()).first()),hasPointerEvents||(this.$dragItem[0].style.visibility="visible"),this.$pointEl.hasClass(opt.handleClass))this.$pointEl=this.$pointEl.parent(opt.itemNodeName);else if(!this.$pointEl.length||!this.$pointEl.hasClass(opt.itemClass))return;if(mouse.isMovingOnXAxis===!1&&Math.abs(mouse.distYtotal)>=5){if(hasRootChanged&&opt.allowListMerging===!1)return;if(hasRootChanged&&"object"==typeof opt.allowListMerging&&-1===opt.allowListMerging.indexOf($rootListOfPointingElement.attr("id")))return;setTotalDistance(0,0);var depth=this.dragDepth-1+this.$pointEl.parents(opt.listNodeName).length,$placeholderParent=this.$placeholder.parent();depth>opt.maxDepth&&opt.event.onItemMaxDepth.forEach(function(cb,i){cb(this.$dragItem)});var before=e.pageY<this.$pointEl.offset().top+this.$pointEl.height()/2;if(this.$pointEl.hasClass(opt.emptyClass)){var $list=$(document.createElement(opt.listNodeName)).addClass(opt.listClass);$list.append(this.$placeholder),this.$pointEl.replaceWith($list)}else before&&$placeholderParent!==this.$pointEl?this.$pointEl.before(this.$placeholder):mouse.dirY>0&&$placeholderParent!==this.$pointEl&&this.$pointEl.after(this.$placeholder);0===$placeholderParent.children().length&&this.unsetEmptyParent($placeholderParent.parent()),0===this.dragRootEl.find(opt.itemNodeName).length&&this.dragRootEl.append('<div class="'+opt.emptyClass+'"/>'),hasRootChanged&&(this.dragRootEl=$rootListOfPointingElement,this.hasNewRoot=this.$instance[0]!==this.dragRootEl[0])}}}}},PublicPlugin.prototype={getLists:function(){return this._lists},parseJson:function(data,override){var data=data||null,override=override||!1;return this._plugin.deserialize(data,override),this},toJson:function(){var data=this._plugin.serialize();return JSON.stringify(data)},expandAll:function(){return this._plugin.expandAll(function(){return!0}),this},collapseAll:function(){return this._plugin.collapseAll(function(){return!0}),this},expand:function(cb){return this._plugin.expandAll(cb),this},collapse:function(cb){return this._plugin.collapseAll(cb),this},onParseJson:function(callback){var _this=this;return _this._plugin.options.event.onParseJson.push(callback.bind(_this)),_this},onItemSetParent:function(callback){var _this=this;return _this._plugin.options.event.onItemSetParent.push(callback.bind(_this)),_this},onItemUnsetParent:function(callback){var _this=this;return _this._plugin.options.event.onItemUnsetParent.push(callback.bind(_this)),_this},onToJson:function(callback){var _this=this;return _this._plugin.options.event.onToJson.push(callback.bind(_this)),_this},onSaveEditBoxInput:function(callback){var _this=this;return _this._plugin.options.event.onSaveEditBoxInput.push(callback.bind(_this)),_this},onItemDrag:function(callback){var _this=this;return _this._plugin.options.event.onItemDrag.push(callback.bind(_this)),_this},onItemDrop:function(callback){var _this=this;return _this._plugin.options.event.onItemDrop.push(callback.bind(_this)),_this},onItemAdded:function(callback){var _this=this;return _this._plugin.options.event.onItemAdded.push(callback.bind(_this)),_this},onItemRemoved:function(callback){var _this=this;return this._plugin.options.event.onItemRemoved.push(callback.bind(_this)),_this},onItemStartEdit:function(callback){var _this=this;return this._plugin.options.event.onItemStartEdit.push(callback.bind(_this)),_this},onItemEndEdit:function(callback){var _this=this;return this._plugin.options.event.onItemEndEdit.push(callback.bind(_this)),_this},onItemAddChildItem:function(callback){var _this=this;return this._plugin.options.event.onItemAddChildItem.push(callback.bind(_this)),_this},onCreateItem:function(callback){var _this=this;return this._plugin.options.event.onCreateItem.push(callback.bind(_this)),_this},onItemCollapsed:function(callback){var _this=this;return this._plugin.options.event.onItemCollapsed.push(callback.bind(_this)),_this},onItemExpanded:function(callback){var _this=this;return this._plugin.options.event.onItemExpanded.push(callback.bind(_this)),_this},onItemMaxDepth:function(callback){var _this=this;return this._plugin.options.event.onItemMaxDepth.push(callback.bind(_this)),_this},on:function(eventBag,callback){var _this=this;return"object"==typeof eventBag?eventBag.forEach(function(event,i){_this._plugin.options.event[event].push(callback.bind(_this))}):"*"===eventBag?Object.keys(_this._plugin.options.event).forEach(function(event,c){_this._plugin.options.event[event].push(callback.bind(_this))}):"string"==typeof eventBag&&_this._plugin.options.event[eventBag].push(callback.bind(_this)),_this},getListNodes:function(){var opt=this._plugin.options,listNodes=this._plugin.$instance.find(opt.listNodeName);return listNodes},getPluginOptions:function(){return this._plugin.options}},$.fn.domenu=function(params){var lists=this.first(),domenu=$(this),plugin=domenu.data("domenu")||new Plugin(this,params),pPlugin=new PublicPlugin(plugin,lists);if(params&&(plugin.options=$.extend(!0,{},defaults,params)),domenu.data("domenu")&&!params||domenu.data("domenu",plugin),!domenu.data("domenu-id")){var pseudoRandomNumericKey=Math.random().toString().replace(/\D/g,"");domenu.data("domenu-id",pseudoRandomNumericKey)}return pPlugin||plugin}}(window.jQuery||window.Zepto,window,document);