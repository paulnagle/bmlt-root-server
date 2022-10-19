/* tslint:disable */
/* eslint-disable */
/**
 * BMLT - OpenAPI 3.0
 * BMLT Admin API Documentation
 *
 * The version of the OpenAPI document: 1.0.0
 * 
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

import { exists, mapValues } from '../runtime';
/**
 * 
 * @export
 * @interface TokenCredentials
 */
export interface TokenCredentials {
    /**
     * 
     * @type {string}
     * @memberof TokenCredentials
     */
    password: string;
    /**
     * 
     * @type {string}
     * @memberof TokenCredentials
     */
    username: string;
}

/**
 * Check if a given object implements the TokenCredentials interface.
 */
export function instanceOfTokenCredentials(value: object): boolean {
    let isInstance = true;
    isInstance = isInstance && "password" in value;
    isInstance = isInstance && "username" in value;

    return isInstance;
}

export function TokenCredentialsFromJSON(json: any): TokenCredentials {
    return TokenCredentialsFromJSONTyped(json, false);
}

export function TokenCredentialsFromJSONTyped(json: any, ignoreDiscriminator: boolean): TokenCredentials {
    if ((json === undefined) || (json === null)) {
        return json;
    }
    return {
        
        'password': json['password'],
        'username': json['username'],
    };
}

export function TokenCredentialsToJSON(value?: TokenCredentials | null): any {
    if (value === undefined) {
        return undefined;
    }
    if (value === null) {
        return null;
    }
    return {
        
        'password': value.password,
        'username': value.username,
    };
}

