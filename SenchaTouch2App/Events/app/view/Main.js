Ext.define("Events.view.Main", {
    extend: 'Ext.navigation.View',
    xtype: 'mainview',

    requires: [
        'Events.view.Events',
        'Events.view.event.Show',
        'Events.view.event.Edit',
        'Events.view.event.Add'
    ],

    config: {
        autoDestroy: false,

        navigationBar: {
            ui: 'sencha',
            items: [
            	{
                    xtype: 'button',
                    id: 'deleteButton',
                    text: 'Delete',
                    align: 'left',
                    hidden: true,
                    hideAnimation: Ext.os.is.Android ? false : {
                        type: 'fadeOut',
                        duration: 200
                    },
                    showAnimation: Ext.os.is.Android ? false : {
                        type: 'fadeIn',
                        duration: 200
                    }
                },
            	{
                    xtype: 'button',
                    id: 'addButton',
                    text: 'Add new',
                    align: 'right',
                    hidden: false,
                    hideAnimation: Ext.os.is.Android ? false : {
                        type: 'fadeOut',
                        duration: 200
                    },
                    showAnimation: Ext.os.is.Android ? false : {
                        type: 'fadeIn',
                        duration: 200
                    }
                },
                {
                    xtype: 'button',
                    id: 'editButton',
                    text: 'Edit',
                    align: 'right',
                    hidden: true,
                    hideAnimation: Ext.os.is.Android ? false : {
                        type: 'fadeOut',
                        duration: 200
                    },
                    showAnimation: Ext.os.is.Android ? false : {
                        type: 'fadeIn',
                        duration: 200
                    }
                },
                {
                    xtype: 'button',
                    id: 'saveButton',
                    text: 'Save',
                    ui: 'sencha',
                    align: 'right',
                    hidden: true,
                    hideAnimation: Ext.os.is.Android ? false : {
                        type: 'fadeOut',
                        duration: 200
                    },
                    showAnimation: Ext.os.is.Android ? false : {
                        type: 'fadeIn',
                        duration: 200
                    }
                }
            ]
        },

        items: [
            { xtype: 'events' }
        ]
    }
});
