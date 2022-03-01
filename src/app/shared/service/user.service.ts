import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { User } from '../model/user';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  getUser(){

  }

  addUser(user:User){
    console.log(user)
 return  this.Http.post<User>('http://localhost:8000/api/user',user)
  }

  constructor(private Http:HttpClient) { }
}
