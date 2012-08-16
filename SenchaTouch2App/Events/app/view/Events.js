Ext.define('Events.view.Events', {
    extend: 'Ext.List',
    xtype: 'events',

    config: {
        title: 'Events',
        cls: 'x-events',
		emptyText: 'No events found',
		scrollable: true,
		styleHtmlContent: true,
        store: 'eventsstore',
        itemTpl: [
            '<span>{title}</span>'
        ].join('')
    }
});
