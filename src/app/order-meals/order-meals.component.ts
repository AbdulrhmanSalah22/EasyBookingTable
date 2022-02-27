import { Component, OnInit,OnChanges } from '@angular/core';
import { Meal } from '../shared/model/meal';
import { MealService } from '../shared/service/meal.service';

@Component({
  selector: 'app-order-meals',
  templateUrl: './order-meals.component.html',
  styleUrls: ['./order-meals.component.css']
})
export class OrderMealsComponent implements OnInit {
  display=true;
listOrder!:Array<Meal>;
// arrIDS:any=[];
  constructor(private orderservice:MealService) { }

  ngOnInit(): void {
this.listOrder=this.orderservice.orderarray;
console.log(this.listOrder);
if(this.listOrder.length>0){
  this.display=false;
}
  }
  // delateMeal(order:Meal){
  //   let index = this.listOrder!.findIndex(ele => ele.id == order.id); 
  //   this.listOrder.splice(index, 1);
  // }
  delateMeal(order:Meal) {

    let index = this.listOrder!.findIndex(ele => ele.id == order.id);    
        if (this.listOrder![index].count == 1) {
      this.listOrder!.splice(index, 1);

    }
    else if (this.listOrder![index].count > 1) {
      this.listOrder![index]!.count--;
    }
    if(this.listOrder.length==0){
      this.display=true;
    }
  }

  checkout(){
    let total=0;
    for(let i=0;i<this.listOrder.length;i++){
         total=total+this.listOrder[i].price*this.listOrder[i].count;
    }
    return total;
  }
  makeorder(){
    // console.log(this.listOrder);
    // for(let i=0;i<this.listOrder.length;i++){
    //     this.arrIDS[i]=(this.listOrder[i].id);
    // }
    // console.log(this.arrIDS);
  }
 
}


