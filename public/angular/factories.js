(function () {
    'use strict';

    angular.module('MyApp').factory('logger', [ logger]);

    function logger() {



        var logIt = function(message, vars, type) {
            return toastr[type](message, vars);
        };

        return {
            log: function(message, vars) {
                logIt(message, vars, 'info');
            },
            logWarning: function(message, vars) {
                logIt(message, vars, 'warning');
            },
            logSuccess: function(message, vars) {
                logIt(message, vars, 'success');
            },
            logError: function(message, vars) {
                logIt(message, vars, 'error');
            },
            check: function(data) {
                if (data.messages)
                {
                    for (var key in data.messages)
                    {
                        var message = data.messages[key];
                        this[this.method(message.type)](message.text);
                    }
                }

                var data = typeof(data.data) == "string" ? JSON.parse(data.data) : data.data;
                if (data)
                {
                    return data;
                }
                else
                {
                    return false;
                }
            },
            method: function(type) {
                return 'log' + type.charAt(0).toUpperCase() + type.slice(1);
            }
        };
    };
})();

;

(function () {
    'use strict';

    angular.module('MyApp').factory('request', ['$http', 'logger', '$cookies', request]);

    function request($http, logger, $cookies) {
        
        return {
            send: function (adrress, post_mas, callback, method) {
                callback = callback || false;
                method = method || 'post';

                var req = {
                    method: method,
                    url: adrress,
                    data: post_mas
                }

                $http(req).then(function(response) {
                    var data = logger.check(response);
                    if (callback) {
                        (callback)(data);
                    }
                }).catch(function(reason) {
                });
            }

        };
    };
})();

;

(function () {
    'use strict';

    angular.module('MyApp').factory('validate', ['logger', validate])
    
    function validate(logger) {     
        return {
            check: function(field, name, object_field, zero) {
                zero = zero || false;
                object_field = object_field || false;
                if (object_field && typeof(field.$viewValue) == 'object')
                {
                    if (field.$viewValue[object_field] == '0')
                    {
                        logger.logError(name + ' is required', {'name': name});
                        return false;
                    }
                }

                if (field.$valid)
                {
                    if ((field.$$element["0"].localName == 'select' || zero) && field.$viewValue == '0')
                    {
                        logger.logError('Choose' + name + 'first', {'name': name});
                        return false;
                    }
                    else
                    {
                        return true;
                    }
                }
                else
                {

                    if ( field.$viewValue == '' || field.$viewValue == undefined )
                    {
                        logger.logError(name + ' is required', {'name': name});
                    }
                    else
                    {
                        logger.logError(name + ' is incorrect', {'name': name});
                    }
                    return false;
                }
            }
        };
    };
})();

;