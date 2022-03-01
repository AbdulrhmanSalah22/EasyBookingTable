import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { User } from '../model/user';
import { OrderService } from './order.service';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  getUser(){

  }

  addUser(user:any){
   let date1= {name: 'aliaaaliyyyyyyyee',email:'aliaa@tahoo'}
    console.log(user)
 return  this.Http.post('http://localhost:8000/api/user/register',user)
  }

  constructor(private Http:HttpClient,private OrderService:OrderService) { }
}
