export interface Meal {
    name:string,
    id?:number,
    img:string,
    price:number,
    des:string,
    cat_id:number,
    category?:any
    count:number,
    option?:string[],
}
