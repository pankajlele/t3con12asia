Ext.define('Events.store.Events', {
    extend: 'Ext.data.Store',

    config: {
        model: 'Events.model.Event',
        storeId: 'eventsstore',
        autoLoad: true
    }
});
