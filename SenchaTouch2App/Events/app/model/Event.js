Ext.define('Events.model.Event', {
    extend: 'Ext.data.Model',
    requires : [ 'Ext.data.proxy.Rest' ],
    config: {
	    idProperty: '__identity',
        fields: [
            {name: 'id', type: 'string'},
            {name: 'title', type: 'string'},
            {name: 'description', type: 'string'},
            {name: 'place', type: 'string'},
            {name: 'startTime', type: 'string'},
            {name: 'endTime', type: 'string'}
        ],
        proxy: {
            type: 'rest',
            url : '/events',
            reader: {
            	type: 'json',
            	rootProperty: 'data'
        	}
        }
    }
});