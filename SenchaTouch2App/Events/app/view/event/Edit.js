Ext.define('Events.view.event.Edit', {
    extend: 'Ext.Container',
    xtype: 'event-edit',

    config: {
        title: 'Edit',
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
