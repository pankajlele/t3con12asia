Ext.define('Events.view.event.Show', {
    extend: 'Ext.Container',
    xtype: 'event-show',

    config: {
        title: 'Information',
        baseCls: 'x-show-event',
        layout: 'vbox',

        items: [
            {
                id: 'content',
                tpl: [
                    '<div class="top">',
                        '<p><span>Title: {title}</span></p>',
                        '<p><span>Description: {description}</span></p>',
                        '<p><span>Place: {place}</span></p>',
                        '<p><span>Start date and time: {startTime}</span></p>',
                        '<p><span>End date and time: {endTime}</span></p>',
                    '</div>'
                ].join('')
            }
        ],

        record: null
    },

    updateRecord: function(newRecord) {
        if (newRecord) {
            this.down('#content').setData(newRecord.data);
        }
    }
});
