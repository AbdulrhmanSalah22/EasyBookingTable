export interface Meal {
    name:string,
    id?:number,
    media:any,
    price:number,
    description:string,
    category_id:number,
    category?:any
    count:number,
    option?:any,
    selectedOption?:number
}
