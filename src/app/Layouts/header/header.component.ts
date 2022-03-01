import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Meal } from 'src/app/shared/model/meal';
import { MealService } from 'src/app/shared/service/meal.service';
import { OrderService } from 'src/app/shared/service/order.service';


@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
show:boolean=true
  reserve:any="reserve";
  constructor(private router:Router,private mealservice:MealService,private OrderService:OrderService) { }

  ngOnInit(): void {
  }
  freg(reserve:string)
  {
    this.router.navigateByUrl('#'+reserve);
  }
  number() {

  return     this.OrderService.orderarray.length;
  }
}
