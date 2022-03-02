import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Meal } from 'src/app/shared/model/meal';
import { MealService } from 'src/app/shared/service/meal.service';
import { OrderService } from 'src/app/shared/service/order.service';
import { UserService } from 'src/app/shared/service/user.service';


@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  show:boolean=true
  Auth!:boolean
  reserve:any="reserve";
  constructor(private router:Router,private mealservice:MealService,
    private OrderService:OrderService,
    private UserService:UserService,
    ) { }

  ngOnInit(): void {
   this.UserService.Auth.subscribe(Auth=>{
    this.Auth=Auth
    })
    // this.UserService.AuthUser.subscribe(user=>this.Auth= user.token? true :false)
    if(localStorage.getItem('toke')){
      this.Auth=true
    }
  }
  freg(reserve:string)
  {
    this.router.navigateByUrl('#'+reserve);
  }
  number() {
  return     this.OrderService.orderarray.length;
  }
  logOut(){
    this.UserService.logOut()
  }
}
