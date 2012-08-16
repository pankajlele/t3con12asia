Ext.define('Events.view.event.Add', {
    extend: 'Ext.Container',
    xtype: 'event-add',

    config: {
        title: 'Add new event',
        layout: 'fit',

        items: [
            {
                xtype: 'formpanel',
                items: [
                    
                            {
                                xtype: 'textfield',
                                label: 'Title',
                                name: 'title'
                            },
                            {
                                xtype: 'textareafield',
                                label: 'Description',
                                name: 'description'
                            },
                            {
                                xtype: 'textfield',
                                label: 'Place',
                                name: 'place'
                            },
                            {
                                xtype: 'textfield',
                                label: 'Start Date and time',
                                name: 'startTime'
                            },
                            {
                                xtype: 'textfield',
                                label: 'End Date and time',
                                name: 'endTime'
                            },
                            {
                    xtype: 'button',
                    id: 'saveButton2',
                    text: 'Save',
                    ui: 'sencha',
                    align: 'left',
                    hidden: false,
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
            }
        ],

        listeners: {
            delegate: 'textfield',
            keyup: 'onKeyUp'
        },

        record: null
    },

    updateRecord: function(newRecord) {
        this.down('formpanel').setRecord(newRecord);
    },

    saveRecord: function() {
        var formPanel = this.down('formpanel'),
            record = formPanel.getRecord();

        formPanel.updateRecord(record);

        return record;
    },

    onKeyUp: function() {
        this.fireEvent('change', this);
    }
});
