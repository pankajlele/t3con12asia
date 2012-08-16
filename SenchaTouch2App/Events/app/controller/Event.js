Ext.define('Events.controller.Event', {
	extend: 'Ext.app.Controller',
    config: {
        refs: {
            main: 'mainview',
            addButton: '#addButton',
            editButton: '#editButton',
            deleteButton: '#deleteButton',
            events: 'events',
            showEvent: 'event-show',
            editEvent: 'event-edit',
            addEvent: 'event-add',
            saveButton: '#saveButton',
            saveButton2: '#saveButton2'
        },

        control: {
            main: {
                push: 'onMainPush',
                pop: 'onMainPop'
            },
            addButton: {
            	tap: 'onEventAdd'
            },
            editButton: {
                tap: 'onEventEdit'
            },
            deleteButton: {
            	tap: 'onEventDelete'
            },
            events: {
                itemtap: 'onEventSelect'
            },
            saveButton: {
                tap: 'onEventSave'
            },
            saveButton2: {
                tap: 'onEventSave2'
            },
            editEvent: {
                change: 'onEventChange'
            }
        }
    },

    onMainPush: function(view, item) {
        var editButton = this.getEditButton();

        if (item.xtype == "event-show") {
            this.getEvents().deselectAll();

            this.showEditButton();
            this.hideAddButton();
        } else {
            this.hideEditButton();
        }
        if (item.xtype == "event-edit") {
        	this.hideAddButton();
        }
    },

    onMainPop: function(view, item) {
        if (item.xtype == "event-edit") {
            this.showEditButton();
        } else {
            this.hideEditButton();
        }
        if (item.xtype == "event-show") {
        	this.showAddButton();
        }
        
    },

    onEventSelect: function(list, index, node, record) {
        var editButton = this.getEditButton();

        if (!this.showEvent) {
            this.showEvent = Ext.create('Events.view.event.Show');
        }

        // Bind the record onto the show event view
        this.showEvent.setRecord(record);

        // Push the show event view into the navigation view
        this.getMain().push(this.showEvent);
    },
    
    onEventAdd: function() {
        if (!this.addEvent) {
            this.addEvent = Ext.create('Events.view.event.Add');
        }

        // Bind the record onto the edit event view
        this.addEvent.setRecord(Ext.create('Events.model.Event'));
		this.hideAddButton();
        this.getMain().push(this.addEvent);
    },

    onEventEdit: function() {
        if (!this.editEvent) {
            this.editEvent = Ext.create('Events.view.event.Edit');
        }

        // Bind the record onto the edit event view
        this.editEvent.setRecord(this.getShowEvent().getRecord());
        this.getMain().push(this.editEvent);
        this.addButtonHide();
    },
    
    onEventDelete: function() {
		var record = this.getShowEvent().getRecord();

		record.erase({
		    success: function(event) {
        		var eventsStore = Ext.StoreMgr.get('eventsstore');
				eventsStore.load();
    		}
		}); //REST call!
		this.getMain().pop();
    },

    onEventChange: function() {
        this.showSaveButton();
    },

    onEventSave: function() {
        var record = this.getEditEvent().saveRecord();

        this.getShowEvent().updateRecord(record);
        record.save(); //REST call!

        this.getMain().pop();
    },
    onEventSave2: function() {
        var record = this.getAddEvent().saveRecord();

        record.save({
		    success: function(event) {
        		var eventsStore = Ext.StoreMgr.get('eventsstore');
				eventsStore.load();
    		}
		}); //REST call!
		
        this.getMain().pop();
    },
	showAddButton: function() {
        var addButton = this.getAddButton();

        if (!addButton.isHidden()) {
            return;
        }

        addButton.show();
    },

    hideAddButton: function() {
        var addButton = this.getAddButton();

        if (addButton.isHidden()) {
            return;
        }

        addButton.hide();
    },
    showEditButton: function() {
        var editButton = this.getEditButton();

        if (!editButton.isHidden()) {
            return;
        }

        this.hideSaveButton();

        editButton.show();
        this.showDeleteButton();
    },

    hideEditButton: function() {
        var editButton = this.getEditButton();

        if (editButton.isHidden()) {
            return;
        }

        editButton.hide();
        this.hideDeleteButton();
    },
    showDeleteButton: function() {
        var deleteButton = this.getDeleteButton();

        if (!deleteButton.isHidden()) {
            return;
        }

        deleteButton.show();
    },

    hideDeleteButton: function() {
        var deleteButton = this.getDeleteButton();

        if (deleteButton.isHidden()) {
            return;
        }

        deleteButton.hide();
    },

    showSaveButton: function() {
        var saveButton = this.getSaveButton();

        if (!saveButton.isHidden()) {
            return;
        }

        saveButton.show();
    },

    hideSaveButton: function() {
        var saveButton = this.getSaveButton();

        if (saveButton.isHidden()) {
            return;
        }

        saveButton.hide();
    },
    
    showSaveButton2: function() {
       /* var saveButton2 = this.getSaveButton2();

        if (!saveButton2.isHidden()) {
            return;
        }

        saveButton2.show();*/
    },

    hideSaveButton2: function() {
        /*var saveButton2 = this.getSaveButton2();

        if (saveButton2.isHidden()) {
            return;
        }

        saveButton2.hide();*/
    }
});