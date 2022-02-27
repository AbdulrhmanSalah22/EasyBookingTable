import { HttpClient } from '@angular/common/http';
import { EventEmitter, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Login } from '../model/login';
import { Meal } from '../model/meal';
import { Resgister } from '../model/register';

@Injectable({
  providedIn: 'root'
})
export class MealService {
  itemAdded: EventEmitter<Meal> = new EventEmitter<Meal>();
  meals: Array<Meal> = [
    {
      name: 'meal11',
      id: 1,
      price:20,
      img: 'https://picsum.photos/200/300',
      count:1,
      // option:["option1","option2"],
    },
    {
      name: 'meal2',
      id: 2,
      price:200,
      img: 'https://picsum.photos/400/100',
      count:1,
      // option:["option3","option4"],
    },
    {
      name: 'meal3',
      id: 3,
      price:300,
      img: 'https://picsum.photos/300/100',
      count:1,
    },
  ];
  cartArray: Meal[] = [];
  orderarray:Meal[]=[];
  getAll() {
    return this.meals;
  }
  getmealbyID(id:number){
    console.log(this.meals.find(i=>i.id === id));
  }
  // addItemToCart(product: Meal): Meal[] {
  //   console.log(this.cartArray);

  //   this.cartArray.push(product);
  //   const res = this.cartArray;
  //   console.log(res);
  //   return res;
  // }
  addorder(meal:Meal):Meal[]{
    // this.orderarray.push(meal);
    // const res = this.orderarray;
    // console.log(res);
    // return res;
       var index =this.orderarray.findIndex(x => x.id == meal.id)
if (index === -1) {
  this.orderarray.push(meal);
 
}
else 
{
  console.log("object already exists");
  this.orderarray[index].count++;
   console.log(this.orderarray[index].count);
  
} 
return this.orderarray;
  }
 

  constructor(private _http:HttpClient) { }

  // sendData(data:Login):Observable<Login>{  
  //   return this._http.post<Login>("http://127.0.0.1:8000/api/login",data);
  //   } 
  // sendData2(data:any):Observable<Resgister>{      
  //   return this._http.post<Resgister>("http://127.0.0.1:8000/api/register",data);
  //   } 


}
