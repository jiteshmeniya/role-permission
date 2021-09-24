/**
 * jQuery transfer
 */
;(function($) {

    var Transfer = function(element, options) {
        this.$element = element;
        // default options
        this.defaults = {
            // data item name
            itemName: "item",
            // group data item name
            groupItemName: "groupItem",
            // group data array name
            groupArrayName: "groupArray",
            // data value name
            valueName: "value",
            // tab text
            tabNameText: "items",
            // right tab text
            rightTabNameText: "selected items",
            // search placeholder text
            searchPlaceholderText: "search",
            // items data array
            dataArray: [],
            // group data array
            groupDataArray: [],
            // wildcard matching item search or searching from beginning of word
            wildcardSearch: true
        };
        // merge options
        this.settings = $.extend(this.defaults, options);

        // tab text
        this.tabNameText = this.settings.tabNameText;
        // right tab text
        this.rightTabNameText = this.settings.rightTabNameText;
        // search placeholder text
        this.searchPlaceholderText = this.settings.searchPlaceholderText;
        // default total number text template
        this.default_total_num_text_template = "pre_num/total_num";
        // default zero item
        this.default_right_item_total_num_text = get_total_num_text(this.default_total_num_text_template, 0, 0);
        // item total number
        this.item_total_num = this.settings.dataArray.length;
        // group item total number
        this.group_item_total_num = get_group_items_num(this.settings.groupDataArray, this.settings.groupArrayName);
        // use group
        this.isGroup = this.group_item_total_num > 0;
        // inner data
        this._data = new InnerMap();
        // inner group data
        this._group_data = new InnerMap();

        // Id
        this.id = (getId())();
        // id selector for the item searcher
        this.itemSearcherId = "#listSearch_" + this.id;
        // id selector for the group item searcher
        this.groupItemSearcherId = "#groupListSearch_" + this.id;
        // id selector for the right searcher
        this.selectedItemSearcherId = "#selectedListSearch_" + this.id;

        // class selector for the transfer-double-list-ul
        this.transferDoubleListUlClass = ".transfer-double-list-ul-" + this.id;
        // class selector for the transfer-double-list-li
        this.transferDoubleListLiClass = ".transfer-double-list-li-" + this.id;
        // class selector for the left checkbox item
        this.checkboxItemClass = ".checkbox-item-" + this.id;
        // class selector for the left checkbox item label
        this.checkboxItemLabelClass = ".checkbox-name-" + this.id;
        // class selector for the left item total number label
        this.totalNumLabelClass = ".total_num_" + this.id;
        // id selector for the left item select all
        this.leftItemSelectAllId = "#leftItemSelectAll_" + this.id;

        // class selector for the transfer-double-group-list-ul
        this.transferDoubleGroupListUlClass = ".transfer-double-group-list-ul-" + this.id;
        // class selector for the transfer-double-group-list-li
        this.transferDoubleGroupListLiClass = ".transfer-double-group-list-li-" + this.id;
        // class selector for the group select all
        this.groupSelectAllClass = ".group-select-all-" + this.id;
        // class selector fro the transfer-double-group-list-li-ul-li
        this.transferDoubleGroupListLiUlLiClass = ".transfer-double-group-list-li-ul-li-" + this.id;
        // class selector for the group-checkbox-item
        this.groupCheckboxItemClass = ".group-checkbox-item-" + this.id;
        // class selector for the group-checkbox-name
        this.groupCheckboxNameLabelClass = ".group-checkbox-name-" + this.id;
        // class selector for the left group item total number label
        this.groupTotalNumLabelClass = ".group_total_num_" + this.id;
        // id selector for the left group item select all
        this.groupItemSelectAllId = "#groupItemSelectAll_" + this.id;

        // class selector for the transfer-double-selected-list-ul
        this.transferDoubleSelectedListUlClass = ".transfer-double-selected-list-ul-" + this.id;
        // class selector for the transfer-double-selected-list-li
        this.transferDoubleSelectedListLiClass = ".transfer-double-selected-list-li-" + this.id;
        // class selector for the right select checkbox item
        this.checkboxSelectedItemClass = ".checkbox-selected-item-" + this.id;
        // id selector for the right item select all
        this.rightItemSelectAllId = "#rightItemSelectAll_" + this.id;
        // class selector for the
        this.selectedTotalNumLabelClass = ".selected_total_num_" + this.id;
        // id selector for the add button
        this.addSelectedButtonId = "#add_selected_" + this.id;
        // id selector for the delete button
        this.deleteSelectedButtonId = "#delete_selected_" + this.id;
    }

    $.fn.transfer = function(options) {
        // new Transfer
        var transfer = new Transfer(this, options);
        // init
        transfer.init();

        return {
            // get selected items
            getSelectedItems: function() {
                return get_selected_items(transfer)
            }
        }
    }

    /**
     * init
     */
    Transfer.prototype.init = function() {
        // generate transfer
        this.$element.append(this.generate_transfer());

        if (this.isGroup) {
            // fill group data
            this.fill_group_data();

            // left group checkbox item click handler
            this.left_group_checkbox_item_click_handler();
            // group select all handler
            this.group_select_all_handler();
            // group item select all handler
            this.group_item_select_all_handler();
            // left group items search handler
            this.left_group_items_search_handler();

        } else {
            // fill data
            this.fill_data();

            // left checkbox item click handler
            this.left_checkbox_item_click_handler();
            // left item select all handler
            this.left_item_select_all_handler();
            // left items search handler
            this.left_items_search_handler();
        }

        // right checkbox item click handler
        this.right_checkbox_item_click_handler();
        // move the pre-selection items to the right handler
        this.move_pre_selection_items_handler();
        // move the selected item to the left handler
        this.move_selected_items_handler();
        // right items search handler
        this.right_items_search_handler();
        // right item select all handler
        this.right_item_select_all_handler();
    }

    /**
     * generate transfer
     */
    Transfer.prototype.generate_transfer = function() {

        var template = parseHTMLTemplate(function() {
            /*
            <div class="transfer-double" id="transfer_double_{{= self.id }}">
                <div class="transfer-double-header"></div>
                <div class="transfer-double-content clearfix">

                    {{ // left part start }}

                    <div class="transfer-double-content-left">
                        <div class="transfer-double-content-param">
                            <div class="param-item">{{= self.tabNameText }}</div>
                        </div>

                        {{= self.isGroup ? self.generate_group_items_container() : self.generate_items_container() }}

                    </div>

                    {{ //  left part end }}

                    <div class="transfer-double-content-middle">
                        <div class="btn-select-arrow" id="add_selected_{{= self.id }}"><i class="iconfont icon-forward"></i></div>
                        <div class="btn-select-arrow" id="delete_selected_{{= self.id }}"><i class="iconfont icon-back"></i></div>
                    </div>

                    {{ // right part start }}

                    <div class="transfer-double-content-right">
                        <div class="transfer-double-content-param">
                            <div class="param-item">{{= self.rightTabNameText }}</div>
                        </div>
                        <div class="transfer-double-selected-list">
                            <div class="transfer-double-selected-list-header">
                                <div class="transfer-double-selected-list-search">
                                    <input class="transfer-double-selected-list-search-input" type="text" id="selectedListSearch_{{= self.id }}" placeholder="{{= self.searchPlaceholderText }}" value="" />
                                </div>
                            </div>
                            <div class="transfer-double-selected-list-content">
                                <div class="transfer-double-selected-list-main">
                                    <ul class="transfer-double-selected-list-ul transfer-double-selected-list-ul-{{= self.id }}"></ul>
                                </div>
                            </div>
                            <div class="transfer-double-list-footer">
                                <div class="checkbox-group">
                                    <input type="checkbox" class="checkbox-normal" id="rightItemSelectAll_{{= self.id }}">
                                    <label for="rightItemSelectAll_{{= self.id }}" class="selected_total_num_{{= self.id }}"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ // right part end }}

                </div>
                <div class="transfer-double-footer"></div>
            </div>
            */
        })

        var compiled = $.template(template);
        return compiled({ self: this })
    }

    /**
     * generate group items container
     */
    Transfer.prototype.generate_group_items_container = function() {

        var template = parseHTMLTemplate(function() {
            /*
            <div class="transfer-double-list transfer-double-list-{{= self.id }}">
                <div class="transfer-double-list-header">
                    <div class="transfer-double-list-search">
                        <input class="transfer-double-list-search-input" type="text" id="groupListSearch_{{= self.id }}" placeholder="{{= self.searchPlaceholderText }}" value="" />
                    </div>
                </div>
                <div class="transfer-double-list-content">
                    <div class="transfer-double-list-main">
                        <ul class="transfer-double-group-list-ul transfer-double-group-list-ul-{{= self.id }}"></ul>
                    </div>
                </div>
                <div class="transfer-double-list-footer">
                    <div class="checkbox-group">
                        <input type="checkbox" class="checkbox-normal" id="groupItemSelectAll_{{= self.id }}"><label for="groupItemSelectAll_{{= self.id }}" class="group_total_num_{{= self.id }}"></label>
                    </div>
                </div>
            </div>
            */
        })

        var compiled = $.template(template);
        return compiled({ self: this })
    }

    /**
     * generate items container
     */
    Transfer.prototype.generate_items_container = function() {

        var template = parseHTMLTemplate(function() {
            /*
            <div class="transfer-double-list transfer-double-list-{{= self.id }}">
                <div class="transfer-double-list-header">
                    <div class="transfer-double-list-search">
                        <input class="transfer-double-list-search-input" type="text" id="listSearch_{{= self.id }}" placeholder="{{= self.searchPlaceholderText }}" value="" />
                    </div>
                </div>
                <div class="transfer-double-list-content">
                    <div class="transfer-double-list-main">
                        <ul class="transfer-double-list-ul transfer-double-list-ul-{{= self.id }}"></ul>
                    </div>
                </div>
                <div class="transfer-double-list-footer">
                    <div class="checkbox-group">
                        <input type="checkbox" class="checkbox-normal" id="leftItemSelectAll_{{= self.id }}"><label for="leftItemSelectAll_{{= self.id }}" class="total_num_{{= self.id }}"></label>
                    </div>
                </div>
            </div>
           */ 
        })

        var compiled = $.template(template);
        return compiled({ self: this })
    }

    /**
     * fill data
     */
    Transfer.prototype.fill_data = function() {
        this.$element.find(this.transferDoubleListUlClass).empty();
        this.$element.find(this.transferDoubleListUlClass).append(this.generate_left_items());

        this.$element.find(this.transferDoubleSelectedListUlClass).empty();
        this.$element.find(this.transferDoubleSelectedListUlClass).append(this.generate_right_items());

        // render total num
        this.$element.find(this.totalNumLabelClass).empty();
        this.$element.find(this.totalNumLabelClass).append(get_total_num_text(this.default_total_num_text_template, 0, this._data.get("left_total_count")));

        // render right total num
        this.$element.find(this.selectedTotalNumLabelClass).empty();
        this.$element.find(this.selectedTotalNumLabelClass).append(get_total_num_text(this.default_total_num_text_template, 0, this._data.get("right_total_count")));
    }

    /**
     * fill group data
     */
    Transfer.prototype.fill_group_data = function() {
        this.$element.find(this.transferDoubleGroupListUlClass).empty();
        this.$element.find(this.transferDoubleGroupListUlClass).append(this.generate_left_group_items());

        this.$element.find(this.transferDoubleSelectedListUlClass).empty();
        this.$element.find(this.transferDoubleSelectedListUlClass).append(this.generate_right_group_items());

        var self = this;
        var left_total_count = 0;
        this._group_data.forEach(function(key, value) {
            left_total_count += value["left_total_count"]
            value["left_total_count"] == 0 ? self.$element.find("#" + key).prop("disabled", true).prop("checked", true) : void(0)
        })

        // render total num
        this.$element.find(this.groupTotalNumLabelClass).empty();
        this.$element.find(this.groupTotalNumLabelClass).append(get_total_num_text(this.default_total_num_text_template, 0, left_total_count));

        // render right total num
        this.$element.find(this.selectedTotalNumLabelClass).empty();
        this.$element.find(this.selectedTotalNumLabelClass).append(get_total_num_text(this.default_total_num_text_template, 0, this._data.get("right_total_count")));
    }

    /**
     * generate left items
     */
    Transfer.prototype.generate_left_items = function() {
        var html = "";
        var dataArray = this.settings.dataArray;
        var itemName = this.settings.itemName;
        var valueName = this.settings.valueName;

        var template = parseHTMLTemplate(function() {
            /*
            <li class="transfer-double-list-li transfer-double-list-li-{{= self.id }} {{= selected ? 'selected-hidden' : ' ' }}">
                <div class="checkbox-group">
                    <input {{= disabled ? disabled="disabled" : "" }} type="checkbox" value="{{= dataArray[i][valueName] }}" class="checkbox-normal checkbox-item-{{= self.id }}" id="itemCheckbox_{{= i }}_{{= self.id }}">
                    <label class="checkbox-name-{{= self.id }}" for="itemCheckbox_{{= i }}_{{= self.id }}">{{= dataArray[i][itemName] }}</label>
                </div>
            </li>
            */
        })

        for (var i = 0; i < dataArray.length; i++) {

            var selected = dataArray[i].selected || false;
            var disabled = dataArray[i].disabled || false;
            var right_total_count = this._data.get("right_total_count") || 0;
            var disabled_count = this._data.get("left_disabled_count") || 0;
            this._data.get("right_total_count") == undefined ? this._data.put("right_total_count", right_total_count) : void(0)
            selected ? this._data.put("right_total_count", ++right_total_count) : void(0)
            !selected && disabled ? this._data.put("left_disabled_count", ++disabled_count) : void(0)

            var compiled = $.template(template);
            html += compiled({ self: this, dataArray: dataArray, i: i, itemName: itemName, valueName: valueName, selected: selected, disabled: disabled })
        }

        this._data.put("left_pre_selection_count", 0);
        this._data.put("left_total_count", dataArray.length - this._data.get("right_total_count"));

        return html;
    }

    /**
     * render left group items
     */
    Transfer.prototype.generate_left_group_items = function() {
        var html = "";
        var id = this.id;
        var groupDataArray = this.settings.groupDataArray;
        var groupItemName = this.settings.groupItemName;
        var groupArrayName = this.settings.groupArrayName;
        var itemName = this.settings.itemName;
        var valueName = this.settings.valueName;

        var groupItemTemplate = parseHTMLTemplate(function() {
            /*
            <li class="transfer-double-group-list-li-ul-li transfer-double-group-list-li-ul-li-{{= self.id }} {{= selected ? 'selected-hidden' : '' }}">
                <div class="checkbox-group">
                    <input type="checkbox" value="{{= groupDataArray[i][groupArrayName][j][valueName] }}" class="checkbox-normal group-checkbox-item-{{= self.id }} belongs-group-{{= i }}-{{= self.id }}" id="group_{{= i }}_checkbox_{{= j }}_{{= self.id }}">
                    <label for="group_{{= i }}_checkbox_{{= j }}_{{= self.id }}" class="group-checkbox-name-{{= self.id }}">{{= groupDataArray[i][groupArrayName][j][itemName] }}</label>
                </div>
            </li>
            */
        })

        var groupTemplate = parseHTMLTemplate(function() {
            /*
            <li class="transfer-double-group-list-li transfer-double-group-list-li-{{= self.id }}">
                <div class="checkbox-group">
                    <input type="checkbox" class="checkbox-normal group-select-all-{{= self.id }}" id="group_{{= i }}_{{= self.id }}">
                    <label for="group_{{= i }}_{{= self.id }}" class="group-name-{{= self.id }}">{{= groupDataArray[i][groupItemName] }}</label>
                </div>
                <ul class="transfer-double-group-list-li-ul transfer-double-group-list-li-ul-{{= self.id }}">
            */
        })
        
        for (var i = 0; i < groupDataArray.length; i++) {
            if (groupDataArray[i][groupArrayName] && groupDataArray[i][groupArrayName].length > 0) {

                var _value = {};
                _value["left_pre_selection_count"] = 0
                _value["left_total_count"] = groupDataArray[i][groupArrayName].length
                this._group_data.put('group_' + i + '_' + this.id, _value);

                var groupTemplateCompiled = $.template(groupTemplate);
                html += groupTemplateCompiled({ self: this, groupDataArray: groupDataArray, i: i, groupItemName: groupItemName })

                for (var j = 0; j < groupDataArray[i][groupArrayName].length; j++) {

                    var selected = groupDataArray[i][groupArrayName][j].selected || false;
                    var right_total_count = this._data.get("right_total_count") || 0;
                    this._data.get("right_total_count") == undefined ? this._data.put("right_total_count", right_total_count) : void(0)
                    selected ? this._data.put("right_total_count", ++right_total_count) : void(0)

                    var groupItem = this._group_data.get('group_' + i + '_' + this.id);
                    selected ? groupItem["left_total_count"] -= 1 : void(0)

                    var groupItemTemplateCompiled = $.template(groupItemTemplate);
                    html += groupItemTemplateCompiled({ self: this, groupDataArray: groupDataArray, i: i, j: j, groupArrayName: groupArrayName, itemName: itemName, valueName: valueName, selected: selected })
                }
                html += '</ul></li>'
            }
        }

        return html;
    }

    /**
     * generate right items
     */
    Transfer.prototype.generate_right_items = function() {
        var html = "";
        var dataArray = this.settings.dataArray;
        var itemName = this.settings.itemName;
        var valueName = this.settings.valueName;
        var selected_count = 0;
        var disabled_count = 0;

        this._data.put("right_pre_selection_count", selected_count);
        this._data.put("right_total_count", selected_count);

        for (var i = 0; i < dataArray.length; i++) {
            if (dataArray[i].selected || false) {
                var disabled = dataArray[i].disabled || false;
                disabled ? disabled_count++ : void(0)
                this._data.put("right_total_count", ++selected_count);
                html += this.generate_item(this.id, i, dataArray[i][valueName], dataArray[i][itemName], disabled);
            }
        }

        this._data.put("right_disabled_count", disabled_count);

        if (this._data.get("right_total_count") == 0) {
            $(this.rightItemSelectAllId).prop("checked", true).prop("disabled", "disabled");
        }

        return html;
    }

    /**
     * generate right group items
     */
    Transfer.prototype.generate_right_group_items = function() {
        var html = "";
        var groupDataArray = this.settings.groupDataArray;
        var groupArrayName = this.settings.groupArrayName;
        var itemName = this.settings.itemName;
        var valueName = this.settings.valueName;
        var selected_count = 0;

        this._data.put("right_pre_selection_count", selected_count);
        this._data.put("right_total_count", selected_count);

        for (var i = 0; i < groupDataArray.length; i++) {
            if (groupDataArray[i][groupArrayName] && groupDataArray[i][groupArrayName].length > 0) {
                for (var j = 0; j < groupDataArray[i][groupArrayName].length; j++) {
                    if (groupDataArray[i][groupArrayName][j].selected || false) {
                        this._data.put("right_total_count", ++selected_count);
                        html += this.generate_group_item(this.id, i, j, groupDataArray[i][groupArrayName][j][valueName], groupDataArray[i][groupArrayName][j][itemName]);
                    }
                }
            }
        }

        if (this._data.get("right_total_count") == 0) {
            $(this.rightItemSelectAllId).prop("checked", true).prop("disabled", "disabled");
        }

        return html;
    }

    /**
     * left checkbox item click handler
     */
    Transfer.prototype.left_checkbox_item_click_handler = function() {
        var self = this;
        self.$element.on("click", self.checkboxItemClass, function () {
            var pre_selection_num = 0;
            $(this).is(":checked") ? pre_selection_num++ : pre_selection_num--

            var left_pre_selection_count = self._data.get("left_pre_selection_count");
            self._data.put("left_pre_selection_count", left_pre_selection_count + pre_selection_num);
            self.$element.find(self.totalNumLabelClass).text(get_total_num_text(self.default_total_num_text_template, self._data.get("left_pre_selection_count"), self._data.get("left_total_count")));

            if (self._data.get("left_pre_selection_count") > 0) {
                $(self.addSelectedButtonId).addClass("btn-arrow-active");
            } else {
                $(self.addSelectedButtonId).removeClass("btn-arrow-active");
            }

            if (self._data.get("left_pre_selection_count") < self._data.get("left_total_count")) {
                $(self.leftItemSelectAllId).prop("checked", false);
            } else if (self._data.get("left_pre_selection_count") == self._data.get("left_total_count")) {
                $(self.leftItemSelectAllId).prop("checked", true);
            }
            if (self._data.get("left_pre_selection_count") == (self._data.get("left_total_count") - self._data.get("left_disabled_count"))) {
                $(self.leftItemSelectAllId).prop("checked", true);
            }
        });
    }

    /**
     * left group checkbox item click handler
     */
    Transfer.prototype.left_group_checkbox_item_click_handler = function() {
        var self = this;
        self.$element.on("click", self.groupCheckboxItemClass, function () {
            var pre_selection_num = 0;
            var total_pre_selection_num = 0;
            var remain_left_total_count = 0

            $(this).is(":checked") ? pre_selection_num++ : pre_selection_num--

            var groupIndex = $(this).prop("id").split("_")[1];
            var groupItem =  self._group_data.get('group_' + groupIndex + '_' + self.id);
            var left_pre_selection_count = groupItem["left_pre_selection_count"];
            groupItem["left_pre_selection_count"] = left_pre_selection_count + pre_selection_num

            self._group_data.forEach(function(key, value) {
                total_pre_selection_num += value["left_pre_selection_count"]
                remain_left_total_count += value["left_total_count"]
            });

            self.$element.find(self.groupTotalNumLabelClass).text(get_total_num_text(self.default_total_num_text_template, total_pre_selection_num, remain_left_total_count));

            if (total_pre_selection_num > 0) {
                $(self.addSelectedButtonId).addClass("btn-arrow-active");
            } else {
                $(self.addSelectedButtonId).removeClass("btn-arrow-active");
            }

            if (groupItem["left_pre_selection_count"] < groupItem["left_total_count"]) {
                self.$element.find("#group_" + groupIndex + "_" + self.id).prop("checked", false);
            } else if (groupItem["left_pre_selection_count"] == groupItem["left_total_count"]) {
                self.$element.find("#group_" + groupIndex + "_" + self.id).prop("checked", true);
            }

            if (total_pre_selection_num == remain_left_total_count) {
                $(self.groupItemSelectAllId).prop("checked", true);
            } else {
                $(self.groupItemSelectAllId).prop("checked", false);
            }
        });
    }

    /**
     * group select all handler
     */
    Transfer.prototype.group_select_all_handler = function() {
        var self = this;
        $(self.groupSelectAllClass).on("click", function () {
            // group index
            var groupIndex = ($(this).attr("id")).split("_")[1];
            var groups =  self.$element.find(".belongs-group-" + groupIndex + "-" + self.id);
            var left_pre_selection_count = 0;
            var left_total_count = 0;

            // a group is checked
            if ($(this).is(':checked')) {
                // active button
                $(self.addSelectedButtonId).addClass("btn-arrow-active");
                for (var i = 0; i < groups.length; i++) {
                    if (!groups.eq(i).is(':checked') && groups.eq(i).parent("div").parent("li").css("display") != "none") {
                        groups.eq(i).prop("checked", true);
                    }
                }

                var groupItem = self._group_data.get($(this).prop("id"));
                groupItem["left_pre_selection_count"] = groupItem["left_total_count"];

                self._group_data.forEach(function(key, value) {
                    left_pre_selection_count += value["left_pre_selection_count"];
                    left_total_count += value["left_total_count"];
                })

                if (left_pre_selection_count == left_total_count) {
                    $(self.groupItemSelectAllId).prop("checked", true);
                }
            } else {
                for (var j = 0; j < groups.length; j++) {
                    if (groups.eq(j).is(':checked') && groups.eq(j).parent("div").parent("li").css("display") != "none") {
                        groups.eq(j).prop("checked", false);
                    }
                }

                self._group_data.get($(this).prop("id"))["left_pre_selection_count"] = 0;

                self._group_data.forEach(function(key, value) {
                    left_pre_selection_count += value["left_pre_selection_count"];
                    left_total_count += value["left_total_count"];
                })

                if (left_pre_selection_count != left_total_count) {
                    $(self.groupItemSelectAllId).prop("checked", false);
                }

                if (left_pre_selection_count == 0) {
                    $(self.addSelectedButtonId).removeClass("btn-arrow-active");
                }
            }
            self.$element.find(self.groupTotalNumLabelClass).text(get_total_num_text(self.default_total_num_text_template, left_pre_selection_count, left_total_count));
        });
    }

    /**
     * group item select all handler
     */
    Transfer.prototype.group_item_select_all_handler = function() {
        var self = this;
        $(self.groupItemSelectAllId).on("click", function () {
            var groupCheckboxItems = self.$element.find(self.groupCheckboxItemClass);
            var left_pre_selection_count = 0;
            var left_total_count = 0;
            if ($(this).is(':checked')) {
                for (var i = 0; i < groupCheckboxItems.length; i++) {
                    if (groupCheckboxItems.parent("div").parent("li").eq(i).css('display') != "none" && !groupCheckboxItems.eq(i).is(':checked')) {
                        groupCheckboxItems.eq(i).prop("checked", true);
                        var groupIndex = groupCheckboxItems.eq(i).prop("id").split("_")[1];
                        if (!self.$element.find(self.groupSelectAllClass).eq(groupIndex).is(':checked')) {
                            self.$element.find(self.groupSelectAllClass).eq(groupIndex).prop("checked", true);
                        }
                    }
                }

                self._group_data.forEach(function (key, value) {
                    value["left_pre_selection_count"] = value["left_total_count"];
                    left_pre_selection_count += value["left_pre_selection_count"];
                    left_total_count += value["left_total_count"];
                })

                $(self.addSelectedButtonId).addClass("btn-arrow-active");
            } else {
                for (var i = 0; i < groupCheckboxItems.length; i++) {
                    if (groupCheckboxItems.parent("div").parent("li").eq(i).css('display') != "none" && groupCheckboxItems.eq(i).is(':checked')) {
                        groupCheckboxItems.eq(i).prop("checked", false);
                        var groupIndex = groupCheckboxItems.eq(i).prop("id").split("_")[1];
                        if (self.$element.find(self.groupSelectAllClass).eq(groupIndex).is(':checked')) {
                            self.$element.find(self.groupSelectAllClass).eq(groupIndex).prop("checked", false);
                        }
                    }
                }

                self._group_data.forEach(function (key, value) {
                    value["left_pre_selection_count"] = 0;
                    left_pre_selection_count = 0;
                    left_total_count += value["left_total_count"];
                })

                $(self.addSelectedButtonId).removeClass("btn-arrow-active");
            }
            self.$element.find(self.groupTotalNumLabelClass).text(get_total_num_text(self.default_total_num_text_template, left_pre_selection_count, left_total_count));
        });
    }

    /**
     * left group items search handler
     */
    Transfer.prototype.left_group_items_search_handler = function() {
        var self = this;
        $(self.groupItemSearcherId).on("keyup", function () {
            self.$element.find(self.transferDoubleGroupListUlClass).css('display', 'block');
            var transferDoubleGroupListLiUlLis = self.$element.find(self.transferDoubleGroupListLiUlLiClass);
            if ($(self.groupItemSearcherId).val() == "") {
                for (var i = 0; i < transferDoubleGroupListLiUlLis.length; i++) {
                    if (!transferDoubleGroupListLiUlLis.eq(i).hasClass("selected-hidden")) {
                        transferDoubleGroupListLiUlLis.eq(i).parent("ul").parent("li").css('display', 'block');
                        transferDoubleGroupListLiUlLis.eq(i).css('display', 'block');
                    } else {
                        transferDoubleGroupListLiUlLis.eq(i).parent("ul").parent("li").css('display', 'block');
                    }
                }
                return;
            }

            // Mismatch
            self.$element.find(self.transferDoubleGroupListLiClass).css('display', 'none');
            transferDoubleGroupListLiUlLis.css('display', 'none');

            for (var j = 0; j < transferDoubleGroupListLiUlLis.length; j++) {
                if (!transferDoubleGroupListLiUlLis.eq(j).hasClass("selected-hidden")
                    && transferDoubleGroupListLiUlLis.eq(j).text().trim()
                        .substr(0, $(self.groupItemSearcherId).val().length).toLowerCase() == $(self.groupItemSearcherId).val().toLowerCase()) {
                            transferDoubleGroupListLiUlLis.eq(j).parent("ul").parent("li").css('display', 'block');
                            transferDoubleGroupListLiUlLis.eq(j).css('display', 'block');
                }
            }
        });
    }

    /**
     * left item select all handler
     */
    Transfer.prototype.left_item_select_all_handler = function() {
        var self = this;
        $(self.leftItemSelectAllId).on("click", function () {
            var checkboxItems = self.$element.find(self.checkboxItemClass);
            var pre_selection_num = self._data.get("left_pre_selection_count");
            if ($(this).is(':checked')) {
                for (var i = 0; i < checkboxItems.length; i++) {
                    if (!checkboxItems.eq(i).prop("disabled")) {
                        if (checkboxItems.eq(i).parent("div").parent("li").css('display') != "none" && !checkboxItems.eq(i).is(':checked') && !checkboxItems.eq(i).prop('disabled')) {
                            checkboxItems.eq(i).prop("checked", true);
                            self._data.put("left_pre_selection_count", ++pre_selection_num);
                        }
                    }
                }
                $(self.addSelectedButtonId).addClass("btn-arrow-active");
            } else {
                for (var i = 0; i < checkboxItems.length; i++) {
                    if (checkboxItems.eq(i).parent("div").parent("li").css('display') != "none" && checkboxItems.eq(i).is(':checked')) {
                        checkboxItems.eq(i).prop("checked", false);
                    }
                }
                $(self.addSelectedButtonId).removeClass("btn-arrow-active");
                self._data.put("left_pre_selection_count", 0);
            }
            self.$element.find(self.totalNumLabelClass).text(get_total_num_text(self.default_total_num_text_template, self._data.get("left_pre_selection_count"), self._data.get("left_total_count")));
        });
    }

    /**
     * right item select all handler
     */
    Transfer.prototype.right_item_select_all_handler = function() {
        var self = this;
        $(self.rightItemSelectAllId).on("click", function () {
            var checkboxSelectedItems = self.$element.find(self.checkboxSelectedItemClass);
            if ($(this).is(':checked')) {
                self._data.put("right_pre_selection_count", 0);
                var right_pre_selection_count = self._data.get("right_pre_selection_count");
                for (var i = 0; i < checkboxSelectedItems.length; i++) {
                    if (checkboxSelectedItems.eq(i).parent("div").parent("li").css('display') != "none" && !checkboxSelectedItems.eq(i).prop("disabled")) {
                        checkboxSelectedItems.eq(i).prop("checked", true);
                        self._data.put("right_pre_selection_count", ++right_pre_selection_count);
                    }
                }

                $(self.deleteSelectedButtonId).addClass("btn-arrow-active");
    
                if (self._data.get("right_pre_selection_count") < self._data.get("right_total_count")) {
                    $(self.rightItemSelectAllId).prop("checked", false);
                } else if (self._data.get("right_pre_selection_count") == self._data.get("right_total_count")) {
                    $(self.rightItemSelectAllId).prop("checked", true);
                }
                if (self._data.get("right_pre_selection_count") == self._data.get("right_total_count") - self._data.get("right_disabled_count")) {
                    $(self.rightItemSelectAllId).prop("checked", true);
                }

            } else {
                for (var i = 0; i < checkboxSelectedItems.length; i++) {
                    if (checkboxSelectedItems.eq(i).parent("div").parent("li").css('display') != "none" && checkboxSelectedItems.eq(i).is(':checked')) {
                        checkboxSelectedItems.eq(i).prop("checked", false);
                    }
                }
                $(self.deleteSelectedButtonId).removeClass("btn-arrow-active");
                self._data.put("right_pre_selection_count", 0);
            }

            self.$element.find(self.selectedTotalNumLabelClass).text(get_total_num_text(self.default_total_num_text_template, self._data.get("right_pre_selection_count"), self._data.get("right_total_count")));

        });
    }

    /**
     * left items search handler
     */
    Transfer.prototype.left_items_search_handler = function() {
        var self = this;
        $(self.itemSearcherId).on("keyup", function () {
            var transferDoubleListLis = self.$element.find(self.transferDoubleListLiClass);
            self.$element.find(self.transferDoubleListUlClass).css('display', 'block');
            if ($(self.itemSearcherId).val() == "") {
                for (var i = 0; i < transferDoubleListLis.length; i++) {
                    if (!transferDoubleListLis.eq(i).hasClass("selected-hidden")) {
                        self.$element.find(self.transferDoubleListLiClass).eq(i).css('display', 'block');
                    }
                }
                return;
            }

            transferDoubleListLis.css('display', 'none');

            if (self.settings.wildcardSearch) {
                for (var j = 0; j < transferDoubleListLis.length; j++) {
                    if (!transferDoubleListLis.eq(j).hasClass("selected-hidden")
                        && transferDoubleListLis.eq(j).text().trim()
                            .toLowerCase().indexOf($(self.itemSearcherId).val().toLowerCase()) > -1 ) {
                                transferDoubleListLis.eq(j).css('display', 'block');
                    }
                }
            } else {
                for (var j = 0; j < transferDoubleListLis.length; j++) {	
                    if (!transferDoubleListLis.eq(j).hasClass("selected-hidden")	
                    && transferDoubleListLis.eq(j).text().trim()	
                            .substr(0, $(self.itemSearcherId).val().length).toLowerCase() == $(self.itemSearcherId).val().toLowerCase()) {	
                                transferDoubleListLis.eq(j).css('display', 'block');	
                    }	
                }
            }
        });
    }

    /**
     * right checkbox item click handler
     */
    Transfer.prototype.right_checkbox_item_click_handler = function() {
        var self = this;
        self.$element.on("click", self.checkboxSelectedItemClass, function () {
            var pre_selection_num = 0;
            $(this).is(":checked") ? pre_selection_num++ : pre_selection_num--

            var right_pre_selection_count = self._data.get("right_pre_selection_count");
            self._data.put("right_pre_selection_count", right_pre_selection_count + pre_selection_num);
            self.$element.find(self.selectedTotalNumLabelClass).text(get_total_num_text(self.default_total_num_text_template, self._data.get("right_pre_selection_count"), self._data.get("right_total_count")));

            if (self._data.get("right_pre_selection_count") > 0) {
                $(self.deleteSelectedButtonId).addClass("btn-arrow-active");
            } else {
                $(self.deleteSelectedButtonId).removeClass("btn-arrow-active");
            }

            if (self._data.get("right_pre_selection_count") < self._data.get("right_total_count")) {
                $(self.rightItemSelectAllId).prop("checked", false);
            } else if (self._data.get("right_pre_selection_count") == self._data.get("right_total_count")) {
                $(self.rightItemSelectAllId).prop("checked", true);
            }
            if (self._data.get("right_pre_selection_count") == self._data.get("right_total_count") - self._data.get("right_disabled_count")) {
                $(self.rightItemSelectAllId).prop("checked", true);
            }

        });
    }

    /**
     * move the pre-selection items to the right handler
     */
    Transfer.prototype.move_pre_selection_items_handler = function() {
        var self = this;
        $(self.addSelectedButtonId).on("click", function () {
            if ($(this).hasClass("btn-arrow-active")) {
                self.isGroup ? self.move_pre_selection_group_items() : self.move_pre_selection_items()
                // callable
                applyCallable(self);
            }
        });
    }

    /**
     * move the pre-selection group items to the right
     */
    Transfer.prototype.move_pre_selection_group_items = function() {
        var pre_selection_num = 0;
        var html = "";
        var groupCheckboxItems = this.$element.find(this.groupCheckboxItemClass);
        for (var i = 0; i < groupCheckboxItems.length; i++) {
            if (!groupCheckboxItems.eq(i).parent("div").parent("li").hasClass("selected-hidden") && groupCheckboxItems.eq(i).is(':checked')) {
                var checkboxItemId = groupCheckboxItems.eq(i).attr("id");
                var groupIndex = checkboxItemId.split("_")[1];
                var itemIndex = checkboxItemId.split("_")[3];
                var labelText = this.$element.find(this.groupCheckboxNameLabelClass).eq(i).text();
                var value = groupCheckboxItems.eq(i).val();

                html += this.generate_group_item(this.id, groupIndex, itemIndex, value, labelText);
                groupCheckboxItems.parent("div").parent("li").eq(i).css("display", "").addClass("selected-hidden");
                pre_selection_num++;

                var groupItem = this._group_data.get('group_' + groupIndex + '_' + this.id);
                var left_total_count = groupItem["left_total_count"];
                var left_pre_selection_count = groupItem["left_pre_selection_count"];
                var right_total_count = this._data.get("right_total_count");
                groupItem["left_total_count"] = --left_total_count;
                groupItem["left_pre_selection_count"] = --left_pre_selection_count;
                this._data.put("right_total_count", ++right_total_count);
            }
        }

        if (pre_selection_num > 0) {
            var groupSelectAllArray = this.$element.find(this.groupSelectAllClass);
            for (var j = 0; j < groupSelectAllArray.length; j++) {
                if (groupSelectAllArray.eq(j).is(":checked")) {
                    groupSelectAllArray.eq(j).prop("disabled", "disabled");
                }
            }

            var remain_left_total_count = 0;
            this._group_data.forEach(function(key, value) {
                remain_left_total_count += value["left_total_count"];
            })

            var groupTotalNumLabel = this.$element.find(this.groupTotalNumLabelClass);
            groupTotalNumLabel.text(get_total_num_text(this.default_total_num_text_template, 0, remain_left_total_count));
            this.$element.find(this.selectedTotalNumLabelClass).text(get_total_num_text(this.default_total_num_text_template, 0, this._data.get("right_total_count")));

            if (remain_left_total_count == 0) {
                $(this.groupItemSelectAllId).prop("checked", true).prop("disabled", "disabled");
            }

            if (this._data.get("right_total_count") > 0) {
                $(this.rightItemSelectAllId).prop("checked", false).removeAttr("disabled");
            }

            $(this.addSelectedButtonId).removeClass("btn-arrow-active");
            var transferDoubleSelectedListUl = this.$element.find(this.transferDoubleSelectedListUlClass);
            transferDoubleSelectedListUl.append(html);
        }
    }

    /**
     * move the pre-selection items to the right
     */
    Transfer.prototype.move_pre_selection_items = function() {
        var pre_selection_num = 0;
        var html = "";
        var self = this;
        var checkboxItems = self.$element.find(self.checkboxItemClass);
        for (var i = 0; i < checkboxItems.length; i++) {
            if (checkboxItems.eq(i).parent("div").parent("li").css("display") != "none" && checkboxItems.eq(i).is(':checked')) {
                var checkboxItemId = checkboxItems.eq(i).attr("id");
                // checkbox item index
                var index = checkboxItemId.split("_")[1];
                var labelText = self.$element.find(self.checkboxItemLabelClass).eq(i).text();
                var value = checkboxItems.eq(i).val();
                self.$element.find(self.transferDoubleListLiClass).eq(i).css("display", "").addClass("selected-hidden");
                html += self.generate_item(self.id, index, value, labelText, false);
                pre_selection_num++;

                var left_pre_selection_count = self._data.get("left_pre_selection_count");
                var left_total_count = self._data.get("left_total_count");
                var right_total_count = self._data.get("right_total_count");
                self._data.put("left_pre_selection_count", --left_pre_selection_count);
                self._data.put("left_total_count", --left_total_count);
                self._data.put("right_total_count", ++right_total_count);
            }
        }

        if (self._data.get("right_total_count") > 0) {
            $(self.rightItemSelectAllId).prop("checked", false).removeAttr("disabled");
        }

        if (pre_selection_num > 0) {
            var totalNumLabel = self.$element.find(self.totalNumLabelClass);
            self.$element.find(self.totalNumLabelClass).text(get_total_num_text(self.default_total_num_text_template, self._data.get("left_pre_selection_count"), self._data.get("left_total_count")));
            totalNumLabel.text(get_total_num_text(self.default_total_num_text_template, self._data.get("left_pre_selection_count"), self._data.get("left_total_count")));
            self.$element.find(self.selectedTotalNumLabelClass).text(get_total_num_text(self.default_total_num_text_template, 0, self._data.get("right_total_count")));
            if (self._data.get("left_total_count") == 0 || (self._data.get("left_disabled_count") == self._data.get("left_total_count"))) {
                $(self.leftItemSelectAllId).prop("checked", true).prop("disabled", "disabled");
            }

            $(self.addSelectedButtonId).removeClass("btn-arrow-active");
            self.$element.find(self.transferDoubleSelectedListUlClass).append(html);
        }
    }

    /**
     * move the selected item to the left handler
     */
    Transfer.prototype.move_selected_items_handler = function() {
        var self = this;
        $(self.deleteSelectedButtonId).on("click", function () {
            if ($(this).hasClass("btn-arrow-active")) {
                self.isGroup ? self.move_selected_group_items() : self.move_selected_items()
                $(self.deleteSelectedButtonId).removeClass("btn-arrow-active");
                // callable
                applyCallable(self);
            }
        });
    }

    /**
     * move the selected group item to the left
     */
    Transfer.prototype.move_selected_group_items = function() {
        var pre_selection_num = 0;
        var checkboxSelectedItems = this.$element.find(this.checkboxSelectedItemClass);        
        for (var i = 0; i < checkboxSelectedItems.length;) {
            var another_checkboxSelectedItems = this.$element.find(this.checkboxSelectedItemClass);
            if (another_checkboxSelectedItems.eq(i).parent("div").parent("li").css("display") != "none" && another_checkboxSelectedItems.eq(i).is(':checked')) {
                var checkboxSelectedItemId = another_checkboxSelectedItems.eq(i).attr("id");
                var groupIndex = checkboxSelectedItemId.split("_")[1];
                var index = checkboxSelectedItemId.split("_")[3];

                another_checkboxSelectedItems.parent("div").parent("li").eq(i).remove();
                this.$element.find("#group_" + groupIndex + "_" + this.id).prop("checked", false).removeAttr("disabled");
                this.$element.find("#group_" + groupIndex + "_checkbox_" + index + "_" + this.id)
                    .prop("checked", false).parent("div").parent("li").css("display", "").removeClass("selected-hidden");

                pre_selection_num++;

                var groupItem = this._group_data.get('group_' + groupIndex + '_' + this.id);
                var left_total_count = groupItem["left_total_count"];
                var right_pre_selection_count = this._data.get("right_pre_selection_count");
                var right_total_count = this._data.get("right_total_count");
                groupItem["left_total_count"] = ++left_total_count;
                this._data.put("right_total_count", --right_total_count);
                this._data.put("right_pre_selection_count", --right_pre_selection_count);

            } else {
                i++;
            }
        }
        if (pre_selection_num > 0) {
            this.$element.find(this.groupTotalNumLabelClass).empty();

            var remain_left_total_count = 0;
            this._group_data.forEach(function(key, value) {
                remain_left_total_count += value["left_total_count"];
            })

            if (this._data.get("right_total_count") == 0) {
                $(this.rightItemSelectAllId).prop("checked", true).prop("disabled", "disabled");
            }

            this.$element.find(this.groupTotalNumLabelClass).text(get_total_num_text(this.default_total_num_text_template, 0, remain_left_total_count));
            this.$element.find(this.selectedTotalNumLabelClass).text(get_total_num_text(this.default_total_num_text_template, 0, this._data.get("right_total_count")));
            if ($(this.groupItemSelectAllId).is(':checked')) {
                $(this.groupItemSelectAllId).prop("checked", false).removeAttr("disabled");
            }
        }
    }

    /**
     * move the selected item to the left
     */
    Transfer.prototype.move_selected_items = function() {
        var pre_selection_num = 0;
        var self = this;

        for (var i = 0; i < self.$element.find(self.checkboxSelectedItemClass).length;) {
            var checkboxSelectedItems = self.$element.find(self.checkboxSelectedItemClass);
            if (checkboxSelectedItems.eq(i).parent("div").parent("li").css("display") != "none" && checkboxSelectedItems.eq(i).is(':checked')) {
                var index = checkboxSelectedItems.eq(i).attr("id").split("_")[1];
                checkboxSelectedItems.parent("div").parent("li").eq(i).remove();
                self.$element.find(self.checkboxItemClass).eq(index).prop("checked", false);
                self.$element.find(self.transferDoubleListLiClass).eq(index).css("display", "").removeClass("selected-hidden");

                pre_selection_num++;

                var right_total_count = self._data.get("right_total_count");
                var right_pre_selection_count = self._data.get("right_pre_selection_count");
                self._data.put("right_total_count", --right_total_count);
                self._data.put("right_pre_selection_count", --right_pre_selection_count);

                var left_total_count = self._data.get("left_total_count");
                self._data.put("left_total_count", ++left_total_count);


            } else {
                i++;
            }
        }

        if (self._data.get("right_total_count") == 0 || (self._data.get("right_pre_selection_count") == self._data.get("right_total_count") - self._data.get("right_disabled_count"))) {
            $(self.rightItemSelectAllId).prop("checked", true).prop("disabled", "disabled");
        }


        if (pre_selection_num > 0) {
            self.$element.find(self.totalNumLabelClass).text(get_total_num_text(self.default_total_num_text_template, self._data.get("left_pre_selection_count"), self._data.get("left_total_count")));
            self.$element.find(self.selectedTotalNumLabelClass).text(get_total_num_text(self.default_total_num_text_template, self._data.get("right_pre_selection_count"), self._data.get("right_total_count")));
            if ($(self.leftItemSelectAllId).is(':checked')) {
                $(self.leftItemSelectAllId).prop("checked", false).removeAttr("disabled");
            }
        }
    }

    /**
     * right items search handler
     */
    Transfer.prototype.right_items_search_handler = function() {
        var self = this;
        $(self.selectedItemSearcherId).keyup(function () {
            var transferDoubleSelectedListLis = self.$element.find(self.transferDoubleSelectedListLiClass);
            self.$element.find(self.transferDoubleSelectedListUlClass).css('display', 'block');

            if ($(self.selectedItemSearcherId).val() == "") {
                transferDoubleSelectedListLis.css('display', 'block');
                return;
            }

            transferDoubleSelectedListLis.css('display', 'none');

            if (self.settings.wildcardSearch) {
                for (var i = 0; i < transferDoubleSelectedListLis.length; i++) {
                    if (transferDoubleSelectedListLis.eq(i).text().trim()
                            .toLowerCase().indexOf($(self.selectedItemSearcherId).val().toLowerCase()) > -1 ) {
                                transferDoubleSelectedListLis.eq(i).css('display', 'block');
                    }
                }
            } else {
                for (var i = 0; i < transferDoubleSelectedListLis.length; i++) {	
                    if (transferDoubleSelectedListLis.eq(i).text().trim()	
                            .substr(0, $(self.selectedItemSearcherId).val().length).toLowerCase() == $(self.selectedItemSearcherId).val().toLowerCase()) {	
                                transferDoubleSelectedListLis.eq(i).css('display', 'block');	
                    }
                }
            }
        });
    }

    /**
     * generate item
     */
    Transfer.prototype.generate_item = function(id, index, value, labelText, disabled) {

        var template = parseHTMLTemplate(function() {
            /*
            <li class="transfer-double-selected-list-li  transfer-double-selected-list-li-{{= id }} .clearfix">
                <div class="checkbox-group">
                    <input {{= disabled ? disabled="disabled" : " " }} type="checkbox" value="{{= value }}" class="checkbox-normal checkbox-selected-item-{{= id }}" id="selectedCheckbox_{{= index }}_{{= id }}">
                    <label class="checkbox-selected-name-{{= id }}" for="selectedCheckbox_{{= index }}_{{= id }}">{{= labelText }}</label>
                </div>
            </li>
            */
        })

        var compiled = $.template(template);
        return compiled({ id: id, index: index, value: value, labelText: labelText, disabled: disabled })
    }

    /**
     * generate group item
     */
    Transfer.prototype.generate_group_item = function(id, groupIndex, itemIndex, value, labelText) {

        var template = parseHTMLTemplate(function() {
            /*
            <li class="transfer-double-selected-list-li transfer-double-selected-list-li-{{= id }} .clearfix">
                <div class="checkbox-group">
                    <input type="checkbox" value="{{= value }}" class="checkbox-normal checkbox-selected-item-{{= id }}" id="group_{{= groupIndex }}_selectedCheckbox_{{= itemIndex }}_{{= id }}">
                    <label class="checkbox-selected-name-{{= id }}" for="group_{{= groupIndex }}_selectedCheckbox_{{= itemIndex }}_{{= id }}">{{= labelText }}</label>
                </div>
            </li>
            */
        })

        var compiled = $.template(template);
        return compiled({ id: id, groupIndex: groupIndex, itemIndex: itemIndex, value: value, labelText: labelText });
    }

    /**
     * apply callable
     */
    function applyCallable(transfer) {
        if (Object.prototype.toString.call(transfer.settings.callable) === "[object Function]") {
          var selected_items = get_selected_items(transfer);

            // send reply in case of empty array
            //if (selected_items.length > 0) {
              transfer.settings.callable.call(transfer, selected_items);
            //}
        }
    }

    /**
     * get selected items
     */
    function get_selected_items(transfer) {
        var selected = [];
        var transferDoubleSelectedListLiArray = transfer.$element.find(transfer.transferDoubleSelectedListLiClass);
        for (var i = 0; i < transferDoubleSelectedListLiArray.length; i++) {
            var checkboxGroup = transferDoubleSelectedListLiArray.eq(i).find(".checkbox-group");

            var item = {};
            item[transfer.settings.itemName] = checkboxGroup.find("label").text();
            item[transfer.settings.valueName] = checkboxGroup.find("input").val();
            selected.push(item);
        }
        return selected;
    }

    /**
     * get group items number
     * @param {Array} groupDataArray
     * @param {string}  groupArrayName
     */
    function get_group_items_num(groupDataArray, groupArrayName) {
        var group_item_total_num = 0;
        for (var i = 0; i < groupDataArray.length; i++) {
            var groupItemData = groupDataArray[i][groupArrayName];
            if (groupItemData && groupItemData.length > 0) {
                group_item_total_num = group_item_total_num + groupItemData.length;
            }
        }
        return group_item_total_num;
    }

    /**
     * replacing the template
     * @param {*} template
     * @param {*} pre_num
     * @param {*} total_num
     */
    function get_total_num_text(template, pre_num, total_num) {
        var _template = template;
        return _template.replace("pre_num", pre_num).replace("total_num", total_num);
    }

    /**
     * Inner Map
     */
    function InnerMap() {
        this.keys = new Array();
        this.values = new Object();

        this.put = function(key, value) {
            if (this.values[key] == null) {
                this.keys.push(key);
            }
            this.values[key] = value;
        }
        this.get = function(key) {
            return this.values[key];
        }
        this.remove = function(key) {
            for (var i = 0; i < this.keys.length; i++) {
                if (this.keys[i] === key) {
                    this.keys.splice(i, 1);
                }
            }
            delete this.values[key];
        }
        this.forEach = function(fn) {
            for (var i = 0; i < this.keys.length; i++) {
                var key = this.keys[i];
                var value = this.values[key];
                fn(key, value);
            }
        }
        this.isEmpty = function() {
            return this.keys.length == 0;
        }
        this.size = function() {
            return this.keys.length;
        }
    }

    /**
     * get id
     */
    function getId() {
        var counter = 0;
        return function(prefix) {
            var id = (+new Date()).toString(32), i = 0;
            for (; i < 5; i++) {
                id += Math.floor(Math.random() * 65535).toString(32);
            }
            return (prefix || '') + id + (counter++).toString(32);
        }
    }

    /**
     * parse html template
     * @param {*} f 
     */
    function parseHTMLTemplate(func) {
        return func.toString().match(/\/\*([\s\S]*?)\*\//)[1]
    }

}(jQuery));


/**
 * underscore.template
 */
;(function ($) {
    var escapes = {
        "'":      "'",
        '\\':     '\\',
        '\r':     'r',
        '\n':     'n',
        '\u2028': 'u2028',
        '\u2029': 'u2029'
    }, escapeMap = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#x27;',
        '`': '&#x60;'
    };
    var escapeChar = function(match) {
        return '\\' + escapes[match];
    };
    var createEscaper = function(map) {
        var escaper = function(match) {
            return map[match];
        };
        var source = "(?:&|<|>|\"|'|`)";
        var testRegexp = RegExp(source);
        var replaceRegexp = RegExp(source, 'g');
        return function(string) {
            string = string == null ? '' : '' + string;
            return testRegexp.test(string) ? string.replace(replaceRegexp, escaper) : string;
        };
    };
    var escape = createEscaper(escapeMap);
    $.extend({
        templateSettings: {
            escape: /{{-([\s\S]+?)}}/g,
            interpolate : /{{=([\s\S]+?)}}/g,
            evaluate: /{{([\s\S]+?)}}/g
        },
        escapeHtml: escape,
        template: function (text, settings) {
            var options = $.extend(true, {}, this.templateSettings, settings);
            var matcher = RegExp([options.escape.source,
			options.interpolate.source,
			options.evaluate.source].join('|') + '|$', 'g');
            var index = 0;
            var source = "__p+='";
            text.replace(matcher, function(match, escape, interpolate, evaluate, offset) {
                source += text.slice(index, offset).replace(/\\|'|\r|\n|\u2028|\u2029/g, escapeChar);
                index = offset + match.length;
                if (escape) {
                    source += "'+\n((__t=(" + escape + "))==null?'':$.escapeHtml(__t))+\n'";
                } else if (interpolate) {
                    source += "'+\n((__t=(" + interpolate + "))==null?'':__t)+\n'";
                } else if (evaluate) {
                    source += "';\n" + evaluate + "\n__p+='";
                }
                return match;
            });
            source += "';\n";
            if (!options.variable) source = 'with(obj||{}){\n' + source + '}\n';
            source = "var __t,__p='',__j=Array.prototype.join," +
                "print=function(){__p+=__j.call(arguments,'');};\n" +
                source + 'return __p;\n';
            try {
                var render = new Function(options.variable || 'obj', source);
            } catch (e) {
                e.source = source;
                throw e;
            }
            var template = function(data) {
                return render.call(this, data);
            };
            var argument = options.variable || 'obj';
            template.source = 'function(' + argument + '){\n' + source + '}';
            return template;
        }
    });
})(jQuery);
