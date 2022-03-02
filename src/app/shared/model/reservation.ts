export interface Reservation {
    start_time:string,
    end_time:string,
    date:string,
    comment:string,
    table_id:string,
    message?:string,
    available?:boolean

}
