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
   this.Http.post<User>('http://localhost:8000/api/user',user).subscribe()
  }

  constructor(private Http:HttpClient) { }
}
